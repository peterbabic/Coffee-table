<?php

namespace Coffee;

// This is not necessary, since it is bootstrapped but serves for debugging purposes
require __DIR__ . '/../../vendor/autoload.php';

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
		$position = new Position(3, 0);
		$this->assertTrue($map->isValidPosition($position));
	}

	public function testInvalidPosition() {
		$description = [
			[0, 1, 0, 1],
			[1, 0, 0, 0],
			[0, 0, 0, 1],
			[0, 0, 0, 1]
		];

		$map = new Map($description);
		$position = new Position(3, 4);
		$this->assertFalse($map->isValidPosition($position));
	}

	public function testUnvisitedPosition() {
		$description = [
			[0, 1, 0, 1],
			[1, 0, 0, 0],
			[0, 0, 0, 1],
			[0, 0, 0, 1]
		];

		$map = new Map($description);
		$position = new Position(0, 0);
		$this->assertFalse($map->isVisitedPosition($position));
	}

	public function testVisitedPosition() {
		$description = [
			[0, 1, 0, 1],
			[1, 0, 0, 0],
			[0, 0, 0, 1],
			[0, 0, 0, 1]
		];

		$map = new Map($description);
		$position = new Position(0, 0);
		$map->visitPosition($position);
		$this->assertTrue($map->isVisitedPosition($position));
	}

//	public function testNextUnvisitedPosition() {
//		$description = [
//			[0, 1, 0, 1],
//			[1, 0, 0, 0],
//			[0, 0, 0, 1],
//			[0, 0, 0, 1]
//		];
//
//		$map = new Map($description);
//		$map->visitPosition(0, 0);
//		$map->visitPosition(0, 1);
//
//		$position = new Position(0, 2);
//		$this->assertEquals($position, $map->getNextUnvisitedPosition());
//	}
}
