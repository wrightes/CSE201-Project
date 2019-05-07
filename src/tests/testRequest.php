<?php 
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class tester extends TestCase {
    public function testRequest() {
		
		$this->assertFalse(checkRequests());
		$this->assertTrue(numRequests() == 0);
		
		submitRequest();
		
		$this->assertTrue(checkRequests());
		$this->assertTrue(numRequests() == 1);
		
		submitRequest("Game", "Developer");
		
		$this->assertTrue(checkRequests());
		$this->assertTrue(numRequests() == 2);
		
		$this->assertTrue(getRequestGame(1) == "--");
		$this->assertTrue(getRequestDev(1) == "--");
		$this->assertFalse(getRequestGame(1) == "Game");
		$this->assertFalse(getRequestDev(1) == "Developer");
		
		$this->assertTrue(getRequestGame(2) == "Game");
		$this->assertTrue(getRequestDev(2) == "Developer");
		$this->assertFalse(getRequestGame(2) == "--");
		$this->assertFalse(getRequestDev(2) == "--");
		
		$this->assertTrue(getRequestByGame("Game"));
		$this->assertTrue(getRequestByDev("Developer"));
	}
}

?>