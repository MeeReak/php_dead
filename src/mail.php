<?php
$to = "recipient@example.com";       // Change to the recipient's email
$subject = "Test Email from PHP";
$message = "Hello, this is a test email sent from PHP!";
$headers = "From: yourname@example.com";  // Change to your sender email

if (mail($to, $subject, $message, $headers)) {
    echo "Email sent successfully!";
} else {
    echo "Failed to send email.";
}
?>
