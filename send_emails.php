<?php
include 'connection.php';
$to_email = "be2018se602@gces.edu.np";
$subject = "Simple Email Test via PHP";
$body = "Hi, This is test email send by PHP Server of Medical Archive";
$headers = "From: medicalarchivenepal@gmail.com";

if (mail($to_email, $subject , $body, $headers)) {
	 echo "Email successfully sent to $to_email...";
	} else{
		echo "Email sending failed...";

	}
	# code...
}

 ?>