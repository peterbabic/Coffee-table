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

//	public function testRemoveFromDescription() {
//		$description = [
//			[0, 1, 0, 1, 1],
//			[1, 0, 1, 0, 1],
//			[0, 0, 0, 1, 0],
//		];
//
//
//		$map = new Map($description);
//		$map->removeFromDescription(0, 3);
//		$map->removeFromDescription(1, 4);
//		$map->removeFromDescription(2, 2);
//
//		$descriptionAfterRemove = [
//			[0, 1, 0, 1],
//			[1, 0, 1, 0],
//			[0, 0, 1, 0],
//		];
//
//		$this->assertEquals($descriptionAfterRemove, $map->describedByArray());
//	}

//	public function testTileLiesOnTable() {
//		$tableMap = [
//			[1, 0],
//			[0, 1],
//		];
//
//		$table = new Table($tableMap);
//		$tile = new Tile(0, 0);
//		$this->assertTrue($table->couldContainTile($tile));
//	}
//
//	public function testTileLiesOutsideTable() {
//		$tableMap = [
//			[1, 0],
//			[0, 1],
//		];
//
//		$table = new Table($tableMap);
//		$tile = new Tile(2, 1);
//		$this->assertFalse($table->couldContainTile($tile));
//	}
}
