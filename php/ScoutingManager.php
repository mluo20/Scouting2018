<?php

/**
* SCOUTING MANAGER FOR TEAM 1676
*/

class ScoutingManager {
	
	public $activeuser = null;
	public $users = null;

	function __construct() {
		if (isset($_SESSION['uid'])) {
			$this->activeuser = User::getuser($_SESSION['uid']);
		}
		else $this->activeuser = 0;
		$this->users = User::getlist();
	}

	public function getmenu() {
		$acl = gettype($this->activeuser) == 'object' ? $this->activeuser->acl : $this->activeuser;
		$id = gettype($this->activeuser) == 'object' ? $this->activeuser->uid : $this->activeuser;
		//0 = not logged in
		//1 = regular user
		//2 = outside team member
		//3 = administrator
		switch ($acl) {
			case 0:
				return "";
				break;
			case 1:
				return <<<_END
				<li><a href="scouting.php">scout</a></li>
				<li><a href="userpage.php?id=$id">user</a></li>
				<li><a onclick="return confirm_alert(this);" href="php/logout.php">logout</a></li>

_END;
				break;
			case 2:
				return <<<_END
				<li><a href="rawdata.php">rawdata</a></li>
				<li><a href="teams.php">teams</a></li>
				<li><a href="userpage.php?id=$id">user</a></li>
				<li><a onclick="return confirm_alert(this);" href="php/logout.php">logout</a></li>

_END;
				break;
			case 3:
				return <<<_END
				<li><a href="scouting.php">scout</a></li>
				<li><a href="superscouting.php">superscout</a></li>
				<li><a href="rawdata.php">rawdata</a></li>
				<li><a href="teams.php">teams</a></li>
				<li><a href="userpage.php?id=$id">user</a></li>
				<li><a onclick="return confirm_alert(this);" href="php/logout.php">logout</a></li>

_END;
				break;
			default:
				return false;
				break;
		}
	}

	public function getuserUI() {

		$userUI = "";

		$acl = gettype($this->activeuser) == 'object' ? $this->activeuser->acl : $this->activeuser;
		$id = gettype($this->activeuser) == 'object' ? $this->activeuser->uid : $this->activeuser;

		switch ($acl) {
			case 0:
				header("Location: login.php");
				break;
			case 1:
			case 2:
				$userUI = "<h1>" . $this->activeuser->firstname . " " . $this->activeuser->lastname . "</h1>";
				if (!isset($_GET['id'])) header("Location: ?id=$id");
				else if ($_GET['id'] != $id) header("Location: ?id=$id");
				break;
			case 3:
				if (isset($_GET['id'])) {
					$id = $_GET['id'];
					$user = User::getuser($id);
					if ($user == false) { echo "User does not exist";}
					else  {
						$userUI = "<a href=\"userpage.php\">See full list of users</a>";
						$userUI .= "<h1>" . $user->firstname . " " . $user->lastname . "</h1>";
					}
				}
				else {
					$userlist = User::getlist();
					$userUI = "<h1>List of Users</h1>";
					$userUI .= "<table id=\"users\" class=\"display\" cellspacing=\"0\" width=\"100%\">";
					$userUI .= "<thead><tr>";
					$userUI .= "<th>Full Name</th><th>Email</th><th>Username</th><th>Team</th><th>Permissions</th>";
					$userUI .= "</tr></thead><tbody>";
					for ($i = 0; $i < count($userlist); $i++) { 
						$user = $userlist[$i];
						$userUI .= "<tr>";
						$userUI .= "<td>" . $user->firstname . " " . $user->lastname . "</td>";
						$userUI .= "<td>" . $user->email . "</td>";
						$userUI .= "<td>" . $user->username . "</td>";
						$userUI .= "<td>" . $user->team . "</td>";
						$userUI .= "<td>" . $user->acl . "</td>";
						$userUI .= "</tr>";
					}
					$userUI .= "</tbody></table>";
				}
				break;
			default:
				return false;
				break;
		}

		return $userUI;

	}

	function register($registerinfo) {

		unset($registerinfo["passagain"]);
		unset($registerinfo["signup"]);
		$registerinfo["team"] = (int) $registerinfo["team"];
		if ($registerinfo["team"] == 1676) $registerinfo["acl"] = 1;
		else $registerinfo["acl"] = 2;

		extract($registerinfo);

		$registerinfo["newpass"] = hash("ripemd128", $newpass);

		$tablevals = USERVALS;
		unset($tablevals[0]);
		$newtablevals = array();
		for ($i = 1; $i <= count($tablevals); $i++) $newtablevals[] = $tablevals[$i];

		return insert("users", $newtablevals, $registerinfo);

	}

}