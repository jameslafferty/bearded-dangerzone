<?php
require "functions.php";
if (isset($_POST["firstName"]) &&
	isset($_POST["lastName"]) &&
	isset($_POST["phone"]) &&
	isset($_POST["attending"])) {
	echo updateResponse($_POST, connect());
}
if (isset($_GET["id"])) {
	$record = readResponse($_GET["id"], connect());
} else {
	header("Location: read.php");
}
?>
<form method="post">
	<input
		name="id"
		type="hidden"
		value="<?php echo $record->id; ?>" />
	<label>
		<span>First Name</span>
		<input
			name="firstName"
			type="text"
			value="<?php echo $record->firstName; ?>" />
	</label>
	<label>
		<span>Last Name</span>
		<input
			name="lastName"
			type="text"
			value="<?php echo $record->lastName; ?>" />
	</label>
	<label>
		<span>Phone Number</span>
		<input 
			name="phone"
			type="text"
			value="<?php echo $record->phone; ?>" />
	</label>
	<p>Will you be attending?</p>
	<label>
		<input
			<?php echo $record->attending ? "checked" : ""; ?>
			name="attending"
			type="radio"
			value="yes" />
		<span>Yes</span>
	</label>
	<label>
		<input
			<?php echo $record->attending ? "" : "checked"; ?>
			name="attending"
			type="radio"
			value="no" />
		<span>No</span>
	</label>
	<button type="submit">
		<span>Submit</span>
	</button>
</form>