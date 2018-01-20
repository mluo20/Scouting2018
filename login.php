<?php
require_once 'php/includes/header.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	if ($_POST['newpass'] != $_POST['passagain']) {
		echo "<p color=\"red\">Passwords do not match</p>";
	}
	else {
		if (register($_POST)) {
			header("Location: ?message=success");
		}
	}
}

if (isset($_GET['message'])) {
	echo "<p color=\"green\">Account successfully created</p>";
}

?>

		<h1>Login/Signup:</h1>
		<div class="row form-row">
			<div class="six columns">
				<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
					<div class="row">
						<h2>Login:</h2>
						<label for="username">Username: </label>
						<input type="text" name="username" id="username" class="u-full-width">
						<label for="password">Password: </label>
						<input type="password" name="password" id="password" class="u-full-width">
						<label>Competition: </label>
						<select name="competition" class="u-full-width">
							<option>Bridgewater</option>
							<option>Montgomery</option>
							<option>Lehigh</option>
							<option>Detroit</option>
						</select>
					</div>
					<div class="row">
						<button type="submit" class="u-pull-right">Login</button>
					</div>
				</form>
			</div>
			<div class="six columns">
				<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" onsubmit="return validatePassword();">
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
						<button type="submit" class="u-pull-right">Signup</button>
					</div>
				</form>
			</div>
		</div>

<?php
require_once 'php/includes/footer.php';
?>