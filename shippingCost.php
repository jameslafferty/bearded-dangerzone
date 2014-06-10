<?php
if (isset($_GET["weight"]) &&
	isset($_GET["shippingMethod"])) {
	$shippingRates = array(
		"FedEx" => 3.75,
		"UPS" => 4.25,
		"USPS Ground" => 2.50,
		"USPS Air" => 3.00
	);
	if (is_numeric($_GET["weight"])) {
		$weight = $_GET["weight"];
	} else {
		$errors[] = "Please use a numeric weight.";
	}
	if (array_key_exists($_GET["shippingMethod"],
		$shippingRates)) {
		$shippingMethod = $_GET["shippingMethod"];
		$myShippingRate = $shippingRates[$shippingMethod];	
	} else {
		$errors[] = "Please select a valid shipping method.";
	}
	if (isset($weight) &&
		isset($myShippingRate)) {
		$shippingCost = $weight * $myShippingRate;
		echo "<p>The shipping cost is $shippingCost</p>";
	} else {
		echo "<ul><li>" . implode("</li><li>", $errors) . "</li></ul>";
	}
	
}
?>
<form>
	<label>
		<span>Weight</span>
		<input name="weight" type="text" />
	</label>
	<label>
		<span>Shipping Method</span>
		<select name="shippingMethod">
			<option>FedEx</option>
			<option>UPS</option>
			<option>USPS Ground</option>
			<option>USPS Air</option>
		</select>
	</label>
	<button type="submit">
		<span>Submit</span>
	</button>
</form>