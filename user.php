<?php
	class User
	{
		private $UID;
		private $firstName;
		private $lastName;
		private $email;
		private $username
		private $password;
		private $team;
		private $ACL;
		
		function __construct($UID, $firstName, $lastName, $email, $username, $password, $team, $ACL)
		{
			$this->UID = $UID;
			$this->firstName = $firstName;
			$this->lastName = $lastName;
			$this->email = $email;
			$this->username = $username;
			$this->password = $password;
			$this->team = $team;
			$this->ACL = $ACL;
		}
	}
	}
?>