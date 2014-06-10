<?php
require "functions.php";
if (isset($_POST["id"])) {
	deleteResponse($_POST["id"], connect());
}
header("Location: read.php");
