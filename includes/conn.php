<?php
	$servername = "localhost";
	$username = "root";
	$password = "rainbow90";
	// $username = "homestead";
	// $password = "secret";
	$db = "quiz";

	// Create connection
	$mysqli = new mysqli($servername, $username, $password, $db);

	// Check connection
	if ($mysqli->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
?>