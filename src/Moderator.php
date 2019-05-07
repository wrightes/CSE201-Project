<?php
require_once("User.php");

class Moderator extends User {
		public function __construct(string $u, string $p) {
			parent::__construct($u, $p);
			$this->modAuth = true;
		}
	}
	
?>