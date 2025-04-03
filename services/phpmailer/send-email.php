<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
$config = require 'config.php';
$address = $_POST['address'];
$message = nl2br($_POST['descripe_problem']); // Converts newlines to HTML line breaks

$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->SMTPAuth   = true;
    $mail->Host       = $config['phpmailer']['mail_host'];
    $mail->Port       = $config['phpmailer']['mail_port'];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Username   = $config['phpmailer']['mail_username'];
    $mail->Password   = $config['phpmailer']['mail_password'];
    $fromemail = $config['phpmailer']['mail_from'];
    // Email headers
    $mail->setFrom($fromemail, "mohammedmogeab");
    $mail->addAddress('ahmedgazy375@gmail.com'); // Recipient email


    // Use HTML for a better formatted message
    $mail->isHTML(true);
    $mail->isHTML(true);
    $mail->Subject = "New Message from Badir Charity";
    $mail->Body = "
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; color: #333; line-height: 1.6; background-color: #f4f4f4; }
                .email-container { max-width: 600px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); }
                .email-header { text-align: center; padding-bottom: 10px; }
                .email-header img { max-width: 150px; }
                .email-content { padding: 20px; border-top: 3px solid #4CAF50; }
                .email-footer { font-size: 12px; color: #777; text-align: center; margin-top: 20px; }
            </style>
        </head>
        <body>
            <div class='email-container'>
                <div class='email-header'>
                    <img src='https://i.postimg.cc/prkHm9JK/badir-logo.jpg' alt='Badir Charity Logo'>
                    <h3 style='color:#4CAF50;'>New Message from Badir Charity</h3>
                </div>
                <div class='email-content'>
                    <p><strong>Address:</strong> {$address}</p>
                    <p><strong>Message:</strong></p>
                    <p>" . nl2br(htmlspecialchars($message)) . "</p>
                    <hr>
                    <p>This email was sent from the Badir Charity contact form.</p>
                </div>
                <div class='email-footer'>
                    <p>&copy; " . date('Y') . " Badir Charity. All rights reserved.</p>
                </div>
            </div>
        </body>
        </html>
    ";




    // Send the email
    if ($mail->send()) {
        echo "Email sent successfully!";
    } else {
        echo "Failed to send email.";
    }
} catch (Exception $e) {
    echo "Mailer Error: {$mail->ErrorInfo}";
}
