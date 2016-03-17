<?php

namespace Coffee;

// This is not necessary, sice it is bootstrapped but serves for debugging purposes
require __DIR__ . '/../vendor/autoload.php';

class MapTest extends \PHPUnit_Framework_TestCase {

	public function testDescribedByArray() {
		$description = [
			[1, 0],
			[0, 1],
		];

		$map = new Map($description);
		$this->assertEquals($description, $map->describedByArray());
	}

	public function testHeight() {
		$description = [
			[0, 1, 0, 1],
			[1, 0, 0, 0],
			[0, 0, 0, 1],
			[0, 0, 0, 1]
		];

		$map = new Map($description);
		$this->assertEquals(4, $map->getHeight());
	}

	public function testWidth() {
		// Even the non-rectangular map descriptions are possible
		$description = [
			[0, 1, 0],
			[1, 0, 0, 0],
			[0, 0, 0,],
			[0, 0, 0]
		];

		$map = new Map($description);
		$this->assertEquals(4, $map->getWidth());
	}

	public function testValidPosition() {
		$description = [
			[0, 1, 0, 1],
			[1, 0, 0, 0],
			[0, 0, 0, 1],
			[0, 0, 0, 1]
		];

		$map = new Map($description);
		$this->assertTrue($map->isValidPosition(3, 0));
	}

	public function testInvalidPosition() {
		$description = [
			[0, 1, 0, 1],
			[1, 0, 0, 0],
			[0, 0, 0, 1],
			[0, 0, 0, 1]
		];

		$map = new Map($description);
		$this->assertFalse($map->isValidPosition(3, 4));
	}

	public function testVisitedPosition() {
		$description = [
			[0, 1, 0, 1],
			[1, 0, 0, 0],
			[0, 0, 0, 1],
			[0, 0, 0, 1]
		];

		$map = new Map($description);
		$map->visitPosition(0, 0);
		$this->assertTrue($map->isVisitedPosition(0, 0));
	}

	public function testNotVisitedPosition() {
		$description = [
			[0, 1, 0, 1],
			[1, 0, 0, 0],
			[0, 0, 0, 1],
			[0, 0, 0, 1]
		];

		$map = new Map($description);
		$map->visitPosition(0, 0);
		$this->assertFalse($map->isVisitedPosition(4, 0));
	}

}
