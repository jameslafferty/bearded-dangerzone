<?php
session_start(); // There is a session_destroy and 
				// you can empty the session.
if (isset($_SESSION["isSubmitted"])) {
	header("Location: read.php");
}
if (isset($_POST["firstName"]) &&
	isset($_POST["lastName"]) &&
	isset($_POST["phone"]) &&
	isset($_POST["attending"])) {
	require "functions.php";
	$_SESSION["isSubmitted"] = true;
	echo recordResponse($_POST, connect());
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
		<input checked name="attending" type="radio" value="no" />
		<span>No</span>
	</label>
	<button type="submit">
		<span>Submit</span>
	</button>
</form>