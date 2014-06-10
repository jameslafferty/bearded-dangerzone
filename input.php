<?php
if (isset($_GET["firstName"])) {
	echo "<p>Hello, {$_GET['firstName']}!</p>";
}
if (isset($_POST["firstName"])) {
	echo "<p>Hello, {$_POST['firstName']}!</p>";
}
?>
<!--<script>
	<?php echo json_encode(array(
		"Echo", "Whisper", "Tigger"
	)) ?>.forEach(function (e) {
		alert(e);
	});
</script>-->
<a href="?firstName=Phil">Click to say hello to Phil</a>
<form>
	<label>
		<span>First Name (GET)</span>
		<input name="firstName" type="text" />
	</label>
	<button type="submit">
		<span>Submit</span>
	</button>
</form>
<form method="post">
	<label>
		<span>First Name (POST)</span>
		<input name="firstName" type="text" />
	</label>
	<button type="submit">
		<span>Submit</span>
	</button>
</form>
