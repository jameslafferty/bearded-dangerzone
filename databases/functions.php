<?php
function connect () {
	return new PDO(
		"mysql:dbname=rsvp;unix_socket=/opt/local/var/run/mysql55/mysqld.sock",
		"root",
		"password"
	);
}