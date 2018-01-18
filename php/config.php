<?php

define("SERVER", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "Scouting2018");

connect() {

	$conn = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE);

	if ($conn->connect_error)
		return "<p>There was a problem. Please contact Miranda or Larry to fix this problem. Here is the error message: </p><p>Connect error: " . $conn->connect_error;
	
	return $conn;

}
