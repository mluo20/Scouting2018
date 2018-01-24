<?php

require_once 'php/config.php';

$createnew = true;

$users = User::getlist();
for ($i = 0; $i < count($users); $i++) { 
	if ($_POST['email'] == $users[$i]->email || $_POST['id_token'] == $users[$i]->id_token) $createnew = false;
}

if ($createnew) {
	$manager->register($_POST);
	// echo "<p style=\"color:red\">An account with that username or email has already been created</p>";
}
// else {
// 	if ($manager->register($_POST)) {
// 		header("Location: ?message=success");
// 	}
// }


$loggeduser = User::getviatoken($_POST['id_token']);

$_SESSION['id'] = $loggeduser->id;
$_SESSION['acl'] = $loggeduser->acl;

header("Location: index.php");

	// else if (isset($_POST["login"])) {
	// 	$result = select("users", USERVALS, "WHERE username = \"" . $_POST['username']. "\" AND password = \"" . hash("ripemd128", $_POST['password'])."\"");
	// 	if (count($result) == 0) {
	// 		echo "<p style=\"color:red\">Username or password is incorrect.</p>";
	// 	}
	// 	else {
	// 		$user = new User($result[0]);
	// 		$_SESSION['acl'] = $user->acl;
	// 		$_SESSION['uid'] = $user->uid;
	// 		$_SESSION['competition'] = $_POST["competition"];
	// 		header("Location: index.php");
	// 	}
	// }
