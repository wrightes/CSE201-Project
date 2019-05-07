<?php
require_once("User.php");

class Admin extends User {
		public function __construct(string $u, string $p) {
			parent::__construct($u, $p);
			$this->adminAuth = true;
		}
	}
	
?>