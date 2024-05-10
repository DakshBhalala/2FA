<?php
session_start();

error_reporting(0);

require "./PHPMailer-master/src/PHPMailer.php";
require "./PHPMailer-master/src/SMTP.php";
require "./PHPMailer-master/src/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$send_to_email = $_SESSION['email'];
$send_to_name = $_SESSION['user'];
$verification_otp = random_int(100000, 999999);
$_SESSION['otp'] = $verification_otp;

function sendMail($send_to, $otp, $name)
{
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'boghanitirth7@gmail.com';
        $mail->Password = 'kuxo rgvx kdxl lmxj';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('boghanitirth7@gmail.com', '2-Step Verification Code');
        $mail->addAddress($send_to);

        $mail->isHTML(True); 
        $mail->Subject = 'Account Activation';
        $mail->Body = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Account Activation</title>
            <style>
                body {
                    font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
                    background-color: #f9f9f9; /* Light gray */
                    margin: 0;
                    padding: 20px;
                }
                .container {
                    max-width: 600px;
                    margin: 0 auto;
                    background-color: #ffffff; /* White */
                    padding: 40px;
                    border-radius: 10px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                    border: 2px solid #cccccc; /* Medium border */
                }
                h1 {
                    text-align: center;
                    color: #333333; /* Dark gray */
                    margin-bottom: 30px;
                    font-size: 24px; /* Larger font size */
                }
                p {
                    margin-bottom: 20px;
                    color: #666666; /* Medium gray */
                    font-size: 16px; /* Larger font size */
                    text-align: justify; /* Justify text */
                }
                .otp-container {
                    text-align: center; /* Center the button */
                    margin-bottom: 30px;
                }
                .otp {
                    padding: 10px 20px;
                    background-color: #007bff; /* Blue */
                    color: #000000; /* White */
                    border: none; /* No border */
                    border-radius: 4px;
                    font-size: 20px; /* Larger font size */
                    text-decoration: none; /* Remove underline */
                    transition: background-color 0.3s ease; /* Smooth hover transition */
                }
                .otp:hover {
                    background-color: #75A47F; /* Darker blue on hover */
                }
                .footer {
                    text-align: center;
                    color: #999999; /* Light gray */
                    font-size: 14px; /* Smaller font size */
                }
            </style>
        </head>
        <body>
            <div class="container">
                <h1>Activation Required</h1>
                <p>Dear ' . $name . ',</p>
                <p>Welcome to our platform! To get started, please activate your account by clicking the button below:</p>
                <div class="otp-container">
                    <a href="#" class="otp">' . $otp . '</a>
                </div>
                <p>If the button above does not work, you can also copy and paste the following link into your browser:</p>
                <p><center>http://localhost/NARUTO/MP/dashboard.php</center></p>
                <p>Thank you for choosing us!</p>
                <p class="footer">Best regards,<br>Your Company Name</p>
            </div>
        </body>
        </html>
        ';
        $mail->send();
        return true;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return false;
    }
}

if (sendMail($send_to_email, $verification_otp, $send_to_name)) {
    echo "Email sent successfully.";
    header("location: otp_confirm.php");
} else {
    echo "Failed to send email.";
}
