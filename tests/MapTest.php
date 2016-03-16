<?php
/**
 * Created by PhpStorm.
 * User: delmadord
 * Date: 3/16/16
 * Time: 6:21 PM
 */

namespace Coffee;

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
		$description = [
			[0, 1, 0],
			[1, 0, 0, 0],
			[0, 0, 0],
			[0, 0, 0]
		];

		$map = new Map($description);
		$this->assertEquals(4, $map->getWidth());
	}

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
