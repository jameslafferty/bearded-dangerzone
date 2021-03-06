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
		$sql = "INSERT INTO responses (
				firstName,
				lastName,
				phone,
				attending
			) VALUES (
				:firstName,
				:lastName,
				:phone,
				:attending
			);";
		$stmt = $pdo->prepare($sql);
		$stmt->execute(array(
			"firstName" =>  $firstName,
			"lastName" => $lastName,
			"phone" => $phone,
			"attending" => "yes" === $attending ? true : false
		));
		return "<p>Thank you for your rsvp.</p>";
	} else {
		return "<ul><li>" . implode("</li><li>", $errors) . "</li></ul>";
	}
}

function displayResponses ($pdo) {
	$sql = "SELECT 
			id, firstName, lastName, phone, attending 
		FROM responses;";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	while ($row = $stmt->fetchObject()) {
		$attending = $row->attending ? "yes" : "no";
		echo "<tr>
			<td>$row->firstName</td>
			<td>$row->lastName</td>
			<td>$row->phone</td>
			<td>$attending</td>
			<td>
				<form action='delete.php' method='post'>
					<input name='id' type='hidden' value='$row->id' />
					<button type='submit'>
						<span>Delete</span>
					</button>
				</form>
			</td>
			<td>
				<a href='update.php?id=$row->id'>Update</a>
			</td>
		</tr>";
	}
}

function deleteResponse ($id, $pdo) {
	$sql = "DELETE FROM responses WHERE id=:id LIMIT 1;";
	$stmt = $pdo->prepare($sql);
	$stmt->execute(array(
		"id" => $id
	));
}

function readResponse ($id, $pdo) {
	$sql = "SELECT id, firstName, lastName, phone, attending FROM responses WHERE id=:id;";
	$stmt = $pdo->prepare($sql);
	$stmt->execute(array(
		"id" => $id
	));
	return $stmt->fetchObject();
}

function updateResponse ($response, $pdo) {
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
		$sql = "UPDATE responses SET
				firstName=:firstName,
				lastName=:lastName,
				phone=:phone,
				attending=:attending
			WHERE id=:id";
		$stmt = $pdo->prepare($sql);
		$stmt->execute(array(
			"id" => $response["id"],
			"firstName" =>  $firstName,
			"lastName" => $lastName,
			"phone" => $phone,
			"attending" => "yes" === $attending ? true : false
		));
		return "<p>Thank you for your rsvp.</p>";
	} else {
		return "<ul><li>" . implode("</li><li>", $errors) . "</li></ul>";
	}
}







