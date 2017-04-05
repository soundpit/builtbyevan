<?php

//echo "sucess!";
//die();

//check post
if ($_SERVER['REQUEST_METHOD'] !== 'POST'){
	
	//set 403 response
	http_response_code(403);
	echo "You are forbidden to access this page";
	die();
}

//Get & Sanitize $_POST Values
$name = strip_tags(trim($_POST['contact-name']));
$email = filter_var(trim($_POST['contact-email']),FILTER_SANITIZE_EMAIL);
$messages = trim($_POST['contact-message']);

//fill in the stuff
$subject = "BuiltbyEvan.com | Message from $name.";
$recipient = "escofieldau@gmail.com";
//Simple Validation
if(empty($name) OR empty($messages) OR empty($email)){
	// Set a 400 (bad request) response code and exit.
	//http_response_code(400);
	echo "blank";
	exit;
}

//Build Message
$message = "Name: $name\n";
$message .= "Email: $email\n\n";
$message .= "Message: \n";
$message .= $messages."\n";

//Build Headers
$headers = "From: $name <$email>";

//Send Email
if(mail($recipient, $subject, $message, $headers)){
	//Set 200 Response (Success)
	http_response_code(200);
	echo "Thank You!! Your message has been sent.";
} else {
	//Set 500 Response (internal server error)
	http_response_code(500);
	echo "Error: There was a problem sending your message";
}