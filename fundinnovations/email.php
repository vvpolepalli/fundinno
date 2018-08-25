<?php
$to = "deepak@fundinnovations.com";
$subject = "PHP Mail from Fundinnovations Server";
$message = "Hello! This is a simple email message.";
$from = "sathyavpk@fundinnovations.com";
$headers = "From: $from";
mail($to,$subject,$message,$headers);
echo "Mail Sent.";
?> 