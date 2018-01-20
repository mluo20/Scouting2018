<?php
require_once 'php/includes/header.php';
if (!isset($_SESSION['uid'])) header("Location: login.php");

if (isset($_SESSION['acl']) && $_SESSION['acl'] != 3) echo "You are not authorized to look at this page";
else {
?>

		<h1>Super Scouting</h1>

		<form action="" method="post" class="dirty-check" id="superscoutingform">

			<div class="row form-row">
				<div class="six columns">
					<label for="climbmethod">Method of Climbing: </label>
					<input type="text" name="climbmethod" id="climbmethod" class="u-full-width" required>
				</div>
				<div class="six columns">
					<label for="autonnav">Auton navigation: </label>
					<input type="text" name="autonnav" id="autonnav" class="u-full-width" required>
				</div>			
			</div>
			<div class="row form-row">
				<div class="six columns">
					<label for="teleoprole">Teleop Role: </label>
					<input type="text" name="teleoprole" id="teleoprole" class="u-full-width" required>
				</div>
				<div class="six columns">
					<label for="endgamerole">Endgame Role: </label>
					<input type="text" name="endgamerole" id="endgamerole" class="u-full-width" required>
				</div>
			</div>
			<div class="row form-row">
				<div class="six columns">
					<label for="intakequality">Quality of Intake: </label>
					<input type="text" name="intakequality" id="intakequality" class="u-full-width" required>
				</div>
				<div class="six columns">
					<label for="climbquality">Quality of Climb: </label>
					<input type="text" name="climbquality" id="climbquality" class="u-full-width" required>
				</div>
			</div>
			<div class="row form-row">
				<div class="12 columns">
					<label for="comments">General comments: </label>
					<textarea name="comments" id="comments" rows="10" class="u-full-width"></textarea>
				</div>
			</div>

			<div class="row form-row">
				<button type="submit" class="u-pull-right">Submit</button>
			</div>

		</form>

<?php
}
require_once 'php/includes/footer.php';
?>