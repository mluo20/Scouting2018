<?php
require_once 'php/config.php';

if (isset($_SESSION['id'])) {
	header("Location: index.php");
}

// if ($_SERVER["REQUEST_METHOD"] === "POST") {

// 	if (isset($_POST["signup"])) {

// 		$createnew = true;

// 		$users = User::getlist();
// 		for ($i = 0; $i < count($users); $i++) { 
// 			if ($_POST['email'] == $users[$i]->email || $_POST['id_token'] == $users[$i]->id_token) $createnew = false;
// 		}
		
// 		if ($createnew) {
// 			$manager->register($_POST);
// 			// echo "<p style=\"color:red\">An account with that username or email has already been created</p>";
// 		}
// 		// else {
// 		// 	if ($manager->register($_POST)) {
// 		// 		header("Location: ?message=success");
// 		// 	}
// 		// }


// 		$loggeduser = User::getviatoken($_POST['id_token']);

// 		$_SESSION['id'] = $loggeduser->id;
// 		$_SESSION['acl'] = $loggeduser->acl;

// 		header("Location: index.php");

// 	}

// 	// else if (isset($_POST["login"])) {
// 	// 	$result = select("users", USERVALS, "WHERE username = \"" . $_POST['username']. "\" AND password = \"" . hash("ripemd128", $_POST['password'])."\"");
// 	// 	if (count($result) == 0) {
// 	// 		echo "<p style=\"color:red\">Username or password is incorrect.</p>";
// 	// 	}
// 	// 	else {
// 	// 		$user = new User($result[0]);
// 	// 		$_SESSION['acl'] = $user->acl;
// 	// 		$_SESSION['uid'] = $user->uid;
// 	// 		$_SESSION['competition'] = $_POST["competition"];
// 	// 		header("Location: index.php");
// 	// 	}
// 	// }

// }

require_once 'php/includes/header.php';

?>

		<h1>Login/Signup:</h1>
		<div class="row form-row">
			<div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
			<form method="POST" id="authenticate" action="authenticate.php">
				<input type="hidden" name="firstname" value="">
				<input type="hidden" name="lastname" value="">
				<input type="hidden" name="email" value="">
				<input type="hidden" name="profile_pic" value="">
				<input type="hidden" name="id_token" value="">
				<input type="hidden" name="team" value="">
				<input type="hidden" name="acl" value="">
			</form>
			<a onclick="signOut()" href="javascript:void(0)">sign out</a>
			<!-- <div class="six columns">
				<form method="POST" action="">
					<div class="row">
						<h2>Login:</h2>
						<label for="username">Username: </label>
						<input type="text" name="username" id="username" class="u-full-width">
						<label for="password">Password: </label>
						<input type="password" name="password" id="password" class="u-full-width">
						<label>Competition: </label>
						<select name="competition" class="u-full-width">
							<option value="bridgewater">Bridgewater</option>
							<option value="montgomery">Montgomery</option>
							<option value="lehigh">Lehigh</option>
							<option value="detroit">Detroit</option>
						</select>
					</div>
					<div class="row">
						<button type="submit" class="u-pull-right" name="login">Login</button>
					</div>
				</form>
			</div>
			<div class="six columns">
				<form method="POST" action="" onsubmit="return validatePassword();">
					<div class="row">
						<h2>Signup:</h2>
						<div class="row">
							<div class="six columns">
								<label for="firstname">First Name: </label>
								<input type="text" name="firstname" id="firstname" class="u-full-width">
							</div>
							<div class="six columns">
								<label for="lastname">Last Name: </label>
								<input type="text" name="lastname" id="lastname" class="u-full-width">
							</div>
						</div>
						<label for="email">Email: </label>
						<input type="email" name="email" required class="u-full-width">
						<label for="newuser">Username: </label>
						<input type="text" name="newuser" id="newuser" class="u-full-width" required>
						<label for="newpass">Password: </label>
						<input type="password" name="newpass" id="newpass" class="u-full-width" required>
						<label for="passagain">Re-type Password: </label>
						<input type="password" name="passagain" id="passagain" class="u-full-width" required>
						<label for="team">Team: </label>
						<input type="number" name="team" id="team" class="u-full-width" required>
					</div>
					<div class="row">
						<button type="submit" class="u-pull-right" name="signup">Signup</button>
					</div>
				</form>
			</div> -->
		</div>

<?php
require_once 'php/includes/footer.php';
?>