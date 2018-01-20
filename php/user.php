<?php
	class User {

		public $uid;
		public $firstname;
		public $lastname;
		public $email;
		public $username;
		public $password;
		public $team;
		public $acl;
		
		//$uid, $firstname, $lastname, $email, $username, $password, $team, $acl
		function __construct($parameters = array()) {
			$this->uid = $parameters["uid"];
			$this->firstname = $parameters["firstname"];
			$this->lastname = $parameters["lastname"];
			$this->email = $parameters["email"];
			$this->username = $parameters["username"];
			$this->password = $parameters["password"];
			$this->team = $parameters["team"];
			$this->acl = $parameters["acl"];
		}

		public static function getlist() {
			$usersarray = select("users", USERVALS, "");
			for ($i = 0; $i < count($usersarray); $i++) {
				$usersarray[$i] = new User($usersarray[$i]);
			}
			return $usersarray;
		}

		public static function getuser($uid) {
			$usersarray = select("users", USERVALS, "WHERE uid = $uid");
			if (isset($usersarray[0])) {
				$user = new User($usersarray[0]);
				return $user;
			}
			else return false;
		}

	}
?>