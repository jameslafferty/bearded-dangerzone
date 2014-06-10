<?php
function connect () {
	return new PDO(
		"mysql:dbname=rsvp;unix_socket=/opt/local/var/run/mysql55/mysqld.sock",
		"root",
		"password"
	);
}

function recordResponse ($response, $pdo) {
	if (!empty($response["firstName"])) {
		$firstName = $response["firstName"];
	} else {
		$errors[] = "A first name is required.";
	}
	if (!empty($response["lastName"])) {
		$lastName = $response["lastName"];
	} else {
		$errors[] = "A last name is required.";
	}
	if (!empty($response["phone"])) {
		$phone = $response["phone"];
	} else {
		$errors[] = "A phone number is required.";
	}
	if (!empty($response["attending"])) {
		$attending = $response["attending"];
	} else {
		$errors[] = "Will you be attending?";
	}
	if (isset($firstName) &&
		isset($lastName) && 
		isset($phone) &&
		isset($attending)) {
		//Database code to go here.
		return "<p>Thank you for your rsvp.</p>";
	} else {
		return "<ul><li>" . implode("</li><li>", $errors) . "</li></ul>";
	}
}