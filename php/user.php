<?php
	class User {

		public $id;
		public $firstname;
		public $lastname;
		public $email;
		public $profile_pic;
		public $id_token;
		public $team;
		public $acl;
		
		//$uid, $firstname, $lastname, $email, $username, $password, $team, $acl
		function __construct($parameters = array()) {
			$this->id = $parameters["id"];
			$this->firstname = $parameters["firstname"];
			$this->lastname = $parameters["lastname"];
			$this->email = $parameters["email"];
			$this->profile_pic = $parameters["profile_pic"];
			$this->id_token = $parameters["id_token"];
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

		public static function getviatoken($id_token) {
			$usersarray = select("users", USERVALS, "WHERE id_token = $id_token");
			if (isset($usersarray[0])) {
				$user = new User($usersarray[0]);
				return $user;
			}
			else return false;
		}

		public static function getuser($id) {
			$usersarray = select("users", USERVALS, "WHERE id = $id");
			if (isset($usersarray[0])) {
				$user = new User($usersarray[0]);
				return $user;
			}
			else return false;
		}

	}
?>