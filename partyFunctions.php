<?php
function recordResponse ($response) {
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
		$handle = fopen("rsvp.csv", "a");
		fputcsv($handle, array(
			$firstName,
			$lastName,
			$phone,
			$attending
		));
		fclose($handle);
		return "<p>Thank you for your rsvp.</p>";
	} else {
		return "<ul><li>" . implode("</li><li>", $errors) . "</li></ul>";
	}
}
