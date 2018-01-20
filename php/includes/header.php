<?php
require_once 'php/config.php';

?>
<!--PASCACK PIONEERS TEAM 1676-->
<!DOCTYPE html>
<html lang="en">

<head>

	<title>Scouting</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/skeleton.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-html5-1.5.1/datatables.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body>

	<header id="header">
	<div class="container">

		<div id="heading">
			<h1><a href="index.php">Pascack Pioneers</a></h1> <!--possibly replace with image-->

		<nav id="menu"> <!--as seen from a full permissions user, will definitely change this later-->
			<ul id="mainmenu" class="topnav">
				<?php
				echo $manager->getmenu();
				?>
			</ul>
			<a href="javascript:void(0);" class="icon" onclick="menu()">&#9776;</a>
		</nav>
		</div>

	</div>
	</header>

	<div id="main">
	<div class="container">