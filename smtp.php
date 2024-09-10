<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'E:\xampp\htdocs\blood_project\PHPMailer-master\PHPMailer-master\src\Exception.php';
require 'E:\xampp\htdocs\blood_project\PHPMailer-master\PHPMailer-master\src\PHPMailer.php';
require 'E:\xampp\htdocs\blood_project\PHPMailer-master\PHPMailer-master\src\SMTP.php';

function sendApprovalEmail($email, $name, $property_name) {
    $subject = "Your Registration Confirmation";
    $message = "<html>
    <head>
        <title>Registration Confirmation</title>
    </head>
    <body>
        <p>Dear $name,</p>
        <p>
            We are pleased to inform you that your registration for <strong>$property_name</strong> has been completed.
        </p>
        <p>Thank you for your interest in donating blood.</p>
    </body>
    </html>";

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'cloudblood261@gmail.com
';
        $mail->Password = 'qqvh aziq xdij zhcd'; // Replace with your actual password or use an app-specific password
        $mail->SMTPSecure = 'tls'; 
        $mail->Port = 587; 

        $mail->setFrom('cloudblood261@gmail.com', 'Blood Donation');
        $mail->addAddress($email, $name);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
        echo 'A confirmation email has been sent to ' . $email;
    } catch (Exception $e) {
        echo "Error sending confirmation email: {$mail->ErrorInfo}";
    }
}
?>
