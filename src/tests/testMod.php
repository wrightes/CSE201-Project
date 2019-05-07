<?php 
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once("src/Moderator.php");

final class tester extends TestCase {
	
	public function testModClass() {
		$testUser = new Moderator("username", password_hash("password", PASSWORD_DEFAULT));
		$testUser2 = new Moderator("differentName", password_hash("differentPassword", PASSWORD_DEFAULT));
		
		$this->assertTrue($testUser->modAuth);
		$this->assertTrue($testUser2->modAuth);
		
		$this->assertTrue($testUser->getUsername() == "username");
		$this->assertFalse($testUser->getUsername() == $testUser2->getUsername());
		
		$this->assertTrue($testUser->verifyPwd("password"));
		$this->assertFalse($testUser->verifyPwd("differentPassword"));
		$this->assertFalse($testUser2->verifyPwd("password"));
		$this->assertTrue($testUser2->verifyPwd("differentPassword"));
	}
}

?>