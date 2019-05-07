<?php 
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once("src/Admin.php");

final class tester extends TestCase {
	
	public function testModClass() {
		$testUser = new Admin("username", password_hash("password", PASSWORD_DEFAULT));
		$testUser2 = new Admin("differentName", password_hash("differentPassword", PASSWORD_DEFAULT));
		
		$this->assertTrue($testUser->adminAuth);
		$this->assertTrue($testUser2->adminAuth);
		
		$this->assertTrue($testUser->getUsername() == "username");
		$this->assertFalse($testUser->getUsername() == $testUser2->getUsername());
		
		$this->assertTrue($testUser->verifyPwd("password"));
		$this->assertFalse($testUser->verifyPwd("differentPassword"));
		$this->assertFalse($testUser2->verifyPwd("password"));
		$this->assertTrue($testUser2->verifyPwd("differentPassword"));
	}
}

?>