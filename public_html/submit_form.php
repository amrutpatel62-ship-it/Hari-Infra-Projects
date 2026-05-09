<?php
ob_start(); 
header('Content-Type: application/json');
error_reporting(0);
ini_set('display_errors', 0);

require_once 'db_config.php';

// Resend API Configuration
// NOTE: Verified domain in Resend is 'mailer.hariindia.in' (not hariinfra.in)
define('RESEND_API_KEY', 're_6yXDjWd8_5fTdWNYZghXQukjyFDJJrC5T');
define('RESEND_API_URL', 'https://api.resend.com/emails');

/**
 * Send email using Resend API (without Composer)
 */
function sendEmailViaResend($to, $from, $subject, $html) {
    $data = [
        'from' => $from,
        'to' => [$to],
        'subject' => $subject,
        'html' => $html
    ];
    
    $ch = curl_init(RESEND_API_URL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Bearer ' . RESEND_API_KEY
    ]);
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    curl_close($ch);
    
    if ($error) {
        return ['success' => false, 'error' => 'cURL Error: ' . $error];
    }
    
    if ($httpCode >= 200 && $httpCode < 300) {
        $responseData = json_decode($response, true);
        return ['success' => true, 'data' => $responseData];
    } else {
        $errorData = json_decode($response, true);
        $errorMsg = $errorData['message'] ?? 'Unknown error';
        return ['success' => false, 'error' => 'Resend API Error: ' . $errorMsg];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = $_POST['name'] ?? '';
    $email   = $_POST['email'] ?? '';
    $phone   = $_POST['phone'] ?? '';
    $subject = $_POST['subject'] ?? '';
    $message = $_POST['message'] ?? '';

    try {
        // 1. Save to Database (Already working)
        $sql = "INSERT INTO contacts (name, email, phone, subject, message) 
                VALUES (:name, :email, :phone, :subject, :message)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':name'=>$name, ':email'=>$email, ':phone'=>$phone, ':subject'=>$subject, ':message'=>$message]);

        // 2. Send Email via Resend
        // Using verified domain: mailer.hariindia.in (verified in Resend dashboard)
        $emailSubject = "New Inquiry: $subject";
        $emailBody = "<b>Name:</b> $name <br><b>Email:</b> $email <br><b>Phone:</b> $phone <br><b>Message:</b> $message";
        
        $result = sendEmailViaResend(
            'info@hariindia.in',  // Changed from hariinfra.in to match website
            'noreply@mailer.hariindia.in',  // Changed from mailer.hariinfra.in to use verified domain
            $emailSubject,
            $emailBody
        );
        
        if ($result['success']) {
            ob_clean();
            echo json_encode(['status' => 'success', 'message' => 'Saved and Email Sent Successfully']);
        } else {
            // Database save succeeded, but email failed - still return success for DB save
            // Log the email error but don't fail the form submission
            ob_clean();
            // Return success since DB save worked, but include email status in message
            $emailStatus = $result['error'] ?? 'Email sending failed';
            echo json_encode([
                'status' => 'success', 
                'message' => 'Your message has been saved. Email notification may have failed: ' . $emailStatus
            ]);
        }
        
    } catch (Exception $e) {
        ob_clean();
        echo json_encode(['status' => 'error', 'message' => 'Error: ' . $e->getMessage()]);
    }
}
exit;