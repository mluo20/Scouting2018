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
				<li><a href="#">user</a></li>
				<li><a onclick="return confirm_alert(this);" href="php/logout.php">logout</a></li>

_END;
				break;
			case 2:
				return <<<_END
				<li><a href="#">rawdata</a></li>
				<li><a href="#">teams</a></li>
				<li><a href="#">user</a></li>
				<li><a onclick="return confirm_alert(this);" href="php/logout.php">logout</a></li>

_END;
				break;
			case 3:
				return <<<_END
				<li><a href="scouting.php">scout</a></li>
				<li><a href="superscouting.php">superscout</a></li>
				<li><a href="#">rawdata</a></li>
				<li><a href="#">teams</a></li>
				<li><a href="#">user</a></li>
				<li><a onclick="return confirm_alert(this);" href="php/logout.php">logout</a></li>

_END;
				break;
			default:
				return false;
				break;
		}
	}

	public function showuserUI() {

	}

}