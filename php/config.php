<?php

define("SERVER", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "Scouting2018");

connect() {
	return new mysqli(SERVER, USERNAME, PASSWORD, DATABASE);
	// if ($conn->connect_error) {
 //    	die("Connection failed: " . $conn->connect_error);
	// } 
}
