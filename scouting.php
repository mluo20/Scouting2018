<?php
require_once 'php/includes/header.php';
?>

		<h1>Scouting</h1>

		<form action="" method="post" class="dirty-check" id="scoutingform">

		<ul id="progressbar">
		    <li class="active">Prematch</li>
		    <li id="auton">Auton</li>
		    <li id="teleop">Teleop</li>
		    <li id="postmatch">Post match</li>
		    <li id="review">Review</li>
		</ul>
		
		<div id="prematch" class="page">
			<div class="form-row row h2">
				<h2>Prematch</h2>
			</div>
			<div class="form-row row">
				<div class="six columns">
					<label for="matchnum">Match Number:</label>
					<input type="number" name="matchnum" id="matchnum">
					<label for="teamnum">Team Number:</label>
					<input type="number" name="teamnum" id="teamnum">
				</div>
				<div class="four columns">
					<div class="selectgroup">
						<strong>Alliance:</strong>
					</div>
					<label for="blue">
						<input type="radio" name="alliance" value="blue" id="blue" checked>
						<span class="label-body">Blue Alliance</span>
					</label>
					<label for="red">
						<input type="radio" name="alliance" value="red" id="red">
						<span class="label-body">Red Alliance</span>
					</label>
				</div>
			</div>

			<div class="form-row row">

				<button type="button" class="nextlink button-primary u-pull-right" onclick="nextPage('auton')">Next</button>
				<button type="button" class="nextlink review button-primary u-pull-right" onclick="nextPage('review')">Review</button>

			</div>

		</div>

		<div id="auton" class="page">

			<div class=" row form-row h2">
				<h2>Autonomous</h2>
			</div>
			<div class="row form-row">

				<div class="four columns">

					<div class="selectgroup">
						<strong>Cross baseline?</strong>
					</div>
					<label for="baseline1">
						<input type="radio" name="baseline" value="1" id="baseline1">
						<span class="label-body">Yes</span>
					</label>
					<label for="baseline2">
						<input type="radio" name="baseline" value="0" id="baseline2" checked>
						<span class="label-body">No</span>
					</label>

				</div>

				<div class="four columns">
					<div class="selectgroup">
						<strong>Switch?</strong>
					</div>
					<label for="switch1">
						<input type="radio" name="switch" value="1" id="switch1" onchange="toggleForm(this);">
						<span class="label-body">Yes</span>
					</label>
					<label for="switch2">
						<input type="radio" name="switch" value="0" id="switch2" onchange="toggleForm(this);" checked>
						<span class="label-body">No</span>
					</label>
				</div>

				<div class="four columns">
					<div class="six columns">
					<div class="selectgroup">
						<strong>Scale?</strong>
					</div>
					<label for="scale1">
						<input type="radio" name="scale" value="1" id="scale1" onchange="toggleForm(this);">
						<span class="label-body">Yes</span></label>
					<label for="scale2">
						<input type="radio" name="scale" value="0" id="scale2" onchange="toggleForm(this);" checked>
						<span class="label-body">No</span></label>
					</div>
				</div>

			</div>

			<div class="row form-row">

				<div class="four columns noselect">
					<!--empty--> 
					&nbsp;
				</div>

				<div class="four columns noselect">
				<div id="correctside1">
					<div class="selectgroup">
					<strong>Correct side? (switch)</strong>
					</div>
					<label for="correctswitch1">
						<input type="radio" name="correctswitch" value="1" id="correctswitch1" class="ays-ignore">
						<span class="label-body">Yes</span>
					</label>
					<label for="correctswitch2">
						<input type="radio" name="correctswitch" value="0" id="correctswitch2" class="ays-ignore" checked>
						<span class="label-body">No</span>
					</label>
				</div>
				&nbsp;
				</div>

				<div class="four columns noselect">
				<div id="correctside2">
					<div class="selectgroup">
					<strong>Correct side? (scale)</strong>
					</div>
					<label for="correctscale1">
						<input type="radio" name="correctscale" value="1" id="correctscale1" class="ays-ignore">
						<span class="label-body">Yes</span>
					</label>
					<label for="correctscale2">
						<input type="radio" name="correctscale" value="0" id="correctscale2" class="ays-ignore" checked>
						<span class="label-body">No</span>
					</label>
				</div>
				&nbsp;
				</div>

			</div>

			<div class="row form-row">
				<button type="button" class="nextlink button-primary u-pull-right" onclick="nextPage('teleop')">Next</button>
				<button type="button" class="nextlink review button-primary u-pull-right" onclick="nextPage('review')">Review</button>
			</div>
		</div>
		<div id="teleop" class="page">

			<div class="row form-row h2">
				<h2>Teleop</h2>
			</div>

			<div class="row form-row">
				<div class="seven columns">
					<h3>Claiming</h3>
					<div id="stopwatchcontainer">
						<span id="stopwatch"></span>
					</div>
					<div class="centercontent">
						<button type="button" id="startbutton">Start</button>
						<button type="button" id="resetbutton">Abort</button>
					</div>
					<div id="claimedtimes">
						
					</div>
				</div>
				<div class="five columns">
					<h3>Cubes obtained</h3>
					<label for="portalcubes">From Portal:</label>
					<div class="numbergroup">
						<button type="button" class="decrement" onclick="decrement('portalcubes')">-</button>
						<input type="number" name="portalcubes" id="portalcubes" value="0">
						<button type="button" class="increment" onclick="increment('portalcubes')">+</button>
					</div>
					<label for="exchangecubes">From Exchange:</label>
					<div class="numbergroup">
						<button type="button" class="decrement" onclick="decrement('exchangecubes')">-</button>
						<input type="number" name="exchangecubes" id="exchangecubes" value="0">
						<button type="button" class="increment" onclick="increment('exchangecubes')">+</button>
					</div>
					<label for="groundcubes">From ground:</label>
					<div class="numbergroup">
						<button type="button" class="decrement" onclick="decrement('groundcubes')">-</button>
						<input type="number" name="groundcubes" id="groundcubes" value="0">
						<button type="button" class="increment" onclick="increment('groundcubes')">+</button>
					</div>
				</div>
			</div>

			<div class="row form-row">
			<button type="button" class="nextlink button-primary u-pull-right" onclick="nextPage('postmatch')">Next</button>
			<button type="button" class="nextlink review button-primary u-pull-right" onclick="nextPage('review')">Review</button>
			</div>
		</div>
		<div id="postmatch" class="page">
			<div class="row form-row h2">
				<h2>Postmatch</h2>
			</div>
			<div class="form-row row">
				<div class="six columns">
					<div class="selectgroup"><strong>Climbing:</strong></div>
					<label for="climb1">
						<input type="checkbox" name="climbing[]" value="climbed" id="climb1">
						<span class="label-body">Climbed</span>
					</label>
					<label for="climb2">
						<input type="checkbox" name="climbing[]" value="withbuddy" id="climb2">
						<span class="label-body">Climbed with buddy</span>
					</label>
					<label for="climb3">
						<input type="checkbox" name="climbing[]" value="lifted" id="climb3">
						<span class="label-body">Lifted others</span>
					</label>
					<label for="climb4">
						<input type="checkbox" name="climbing[]" value="bebuddy" id="climb4">
						<span class="label-body">Was the buddy</span>
					</label>
				</div>
				<div class="six columns">
					<label for="bluescore">Blue Score:</label><input type="number" name="bluescore" id="bluescore">
					<label for="redscore">Red Score:</label><input type="number" name="redscore" id="redscore">
				</div>
			</div>
			<div class="form-row row">
				<button type="button" class="nextlink button-primary u-pull-right" onclick="nextPage('review'); addReview();">Review</button>
			</div>
		</div>
		<div id="review" class="page">
			<div class="row form-row">
				<div id="prematchvals" class="six columns">
					<div class="h2"><h2>Prematch</h2>&nbsp;&nbsp;<a href="javascript:void(0)" onclick="nextPage('prematch')"><i class="fas fa-edit"></i>edit</a></div>
					<ol>
						<li>Match Number: </li>
						<li>Team Number: </li>
						<li>Alliance: </li>
					</ol>
				</div>
				<div id="autonvals" class="six columns">
					<div class="h2"><h2>Auton</h2>&nbsp;&nbsp;<a href="javascript:void(0)" onclick="nextPage('auton')"><i class="fas fa-edit"></i>edit</a></div>
					<ol>
						<li>Cross Baseline? </li>
						<li>Switch? </li>
							<ul id="c1">
								<li>Correct side? </li>
							</ul>
						<li>Scale? </li>
							<ul id="c2">
								<li>Correct side? </li>
							</ul>
					</ol>
				</div>
			</div>
			<div class="row form-row">
				<div id="teleopvals" class="six columns">
					<div class="h2"><h2>Teleop</h2>&nbsp;&nbsp;<a href="javascript:void(0)" onclick="nextPage('teleop')"><i class="fas fa-edit"></i>edit</a></div>
					<ol>
						<li>Acquired Portal Cubes: </li>
						<li>Acquired Exchange Cubes: </li>
						<li>Acquired Ground Cubes: </li>
						<li>Claimed Times: </li>
					</ol>
				</div>
				<div id="postmatchvals" class="six columns">
					<div class="h2"><h2>Postmatch</h2>&nbsp;&nbsp;<a href="javascript:void(0)" onclick="nextPage('postmatch')"><i class="fas fa-edit"></i>edit</a></div>
					<ol>
						<li>Climbing: </li>
						<li>Blue score: </li>
						<li>Red score: </li>
					</ol>
				</div>
			</div>
			<div class="row form-row">
				<button type="submit" class="u-pull-right">Submit</button>
			</div>


		</div>
		<div id="robotstatus" class="row form-row">
			<strong>Robot Status: </strong>
			<label for="estopped"><input type="checkbox" name="status" value="estopped" id="estopped"><span class="label-body">E-stopped</span></label>
			<label for="dqed"><input type="checkbox" name="status" value="dqed" id="dqed"><span class="label-body">DQed</span></label>
			<label for="disabled"><input type="checkbox" name="status" value="disabled" id="disabled"><span class="label-body">Disabled</span></label>
			<label for="bypassed"><input type="checkbox" name="status" value="bypassed" id="bypassed"><span class="label-body">Bypassed</span></label>
		</div>

		</form>

<?php
require_once 'php/includes/footer.php';
?>