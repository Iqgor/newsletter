<?php
$to = "test@mailhog.local";
$subject = "Hey, I’m Pi Hog Pi!";
$body = "Hello, MailHog!";
$headers = "From: pihogpi@kinsta.com" . "\r\n";



if (mail($to, $subject, $body, $headers)) {
    echo "Message accepted";
} else {
    echo "Error: Message not accepted";
}
