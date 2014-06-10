<?php
//$handle = fopen("addresses.csv", "w");
//fputcsv($handle, array(
//	"Barak",
//	"Obama",
//	"1600 Pennsylvania Avenue",
//	"Washington",
//	"DC",
//	"20500"
//));
//fclose($handle);
if (isset($_POST["firstName"]) &&
	isset($_POST["lastName"]) &&
	isset($_POST["phone"]) &&
	isset($_POST["attending"])) {
	if (!empty($_POST["firstName"])) {
		$firstName = $_POST["firstName"];
	} else {
		$errors[] = "A first name is required.";
	}
	if (!empty($_POST["lastName"])) {
		$lastName = $_POST["lastName"];
	} else {
		$errors[] = "A last name is required.";
	}
	if (!empty($_POST["phone"])) {
		$phone = $_POST["phone"];
	} else {
		$errors[] = "A phone number is required.";
	}
	if (!empty($_POST["attending"])) {
		$attending = $_POST["attending"];
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
		echo "<p>Thank you for your rsvp.</p>";
	} else {
		echo "<ul><li>" . implode("</li><li>", $errors) . "</li></ul>";
	}
}
?>
<form method="post">
	<label>
		<span>First Name</span>
		<input name="firstName" type="text" />
	</label>
	<label>
		<span>Last Name</span>
		<input name="lastName" type="text" />
	</label>
	<label>
		<span>Phone Number</span>
		<input name="phone" type="text" />
	</label>
	<p>Will you be attending?</p>
	<label>
		<input name="attending" type="radio" value="yes" />
		<span>Yes</span>
	</label>
	<label>
		<input name="attending" type="radio" value="no" />
		<span>No</span>
	</label>
	<button type="submit">
		<span>Submit</span>
	</button>
</form>