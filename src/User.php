<?php 

class User {
		private $username;
		private $password;
		public $modAuth;
		public $adminAuth;
		
		public function __construct(string $u, string $p) {
			$this->username = $u;
			$this->password = $p;
			$this->modAuth = false;
			$this->adminAuth = false;
		}
		
		public function getUsername() {
			return $this->username;
		}
		
		public function verifyPwd(string $p) {
			if(password_verify($p, $this->password))
				return true;
			else
				return false;
		}
	}
	
?>