<?php 
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class tester extends TestCase {
    public function testUserClass {
		$test = new $user();
		
		$this->asserTrue($test.getUsername() == "user");
		$this->assertTrue($test.verifyPwd("password");
		
		$testUser = new $user("username", password_hash("password", PASSWORD_DEFAULT));
		$testUser2 = new $user("differentName", "differentPassword");
		
		$this->assertTrue($testUser.getUsername() == "username");
		$this->assertFalse($testUser.getUsername() == $testUser2.getUsername());
		
		$this->assertTrue($testUser.verifyPwd("password");
		$this->assertFalse($testUser.verifyPwd("differentPassword");
		$this->assertTrue($testUser2.verifyPwd("password");
		$this->assertTrue($testUser2.verifyPwd("differentPassword");
	}
	
	public function testModClass {
		$test = new $moderator();
		
		$this->assertTrue($test.$modAuth);
		
		$this->asserTrue($test.getUsername() == "user");
		$this->assertTrue($test.verifyPwd("password");
		
		$testUser = new $moderator("username", password_hash("password", PASSWORD_DEFAULT));
		$testUser2 = new $moderator("differentName", "differentPassword");
		
		$this->assertTrue($testUser.$modAuth);
		$this->assertTrue($testUser2.$modAuth);
		
		$this->assertTrue($testUser.getUsername() == "username");
		$this->assertFalse($testUser.getUsername() == $testUser2.getUsername());
		
		$this->assertTrue($testUser.verifyPwd("password");
		$this->assertFalse($testUser.verifyPwd("differentPassword");
		$this->assertTrue($testUser2.verifyPwd("password");
		$this->assertTrue($testUser2.verifyPwd("differentPassword");
	}
}

?>