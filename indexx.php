<?php
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$message = $_POST['message'];
		$from = 'Contact Form'; 
		$to = 'demmy@iamdemmy.com'; 
		$subject = 'Message from MAEL Shipping ';
		
		$body = "From: $name\n E-Mail: $email\n phone: $phone\n Message:\n $message";
		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Please enter your name';
		}
		
		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address';
		}
		// Check if phone has been entered
		if (!$_POST['phone']) {
			$errPhone = 'Please enter your number';
		}
		
		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Please enter your message';
		}
		
 
// If there are no errors, send the email
if (!$errName && !$errEmail && !$errPhone && !$errMessage) {
	if (mail ($to, $subject, $body, $from)) {
		$result='<div class="alert alert-success">Thank You for youe Message, we would get in touch with you</div>';
	} else {
		$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again </div>';
	}
}
	}
?>