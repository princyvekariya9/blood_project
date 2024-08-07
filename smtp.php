<?php
/**
 * This example shows making an SMTP connection with authentication.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that

session_start();
$email = $_SESSION['user_email'];
date_default_timezone_set('Etc/UTC');

require 'mail/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = "smtp.gmail.com";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 587;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "princyvekariya986@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "yvml aosu orbo nisj";
//Set who the message is to be sent from
$mail->setFrom('princyvekariya986@gmail.com', 'First Last');
//Set an alternative reply-to address
$mail->addReplyTo('princyvekariya986@gmail.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress('princyvekariya986@gmail.com', 'John Doe');
//Set the subject line
$mail->Subject = 'PHPMailer SMTP test';
$otp = rand(1000,9999);
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$msg = "Your OTP is <h1>".$otp."</h1>";
$mail->msgHTML($msg);
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
