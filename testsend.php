<?php
$to_email = "syazwanyuznann@gmail.com";
$subject = "Booking Table Service";
$body = "Hi,Your booking is complete . Thank you for having us!";
$headers = "From: mymakan@services.com";
 
if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}
?>