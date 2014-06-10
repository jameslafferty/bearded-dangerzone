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
require "partyFunctions.php";
if (isset($_POST["firstName"]) &&
	isset($_POST["lastName"]) &&
	isset($_POST["phone"]) &&
	isset($_POST["attending"])) {
	echo recordResponse($_POST);
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