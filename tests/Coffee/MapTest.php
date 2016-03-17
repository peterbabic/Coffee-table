<?php

namespace Coffee;

// This is not necessary, since it is bootstrapped but serves for debugging purposes
require __DIR__ . '/../../vendor/autoload.php';

class MapTest extends \PHPUnit_Framework_TestCase {

	public function testGetTiles() {
		$tileA = new Tile(1, 1, Tile::REPRESENTS_SPOT);
		$tileB = new Tile(1, 2, Tile::REPRESENTS_VOID);

		$map = new Map([[1, 0]]);
		$this->assertEquals([$tileA, $tileB], $map->getTiles());
	}

	public function testUnVisitedTiles() {
		$description = [
			[1, 0],
			[0, 1],
		];

		$map = new Map($description);
		$tiles = $map->getTiles();
		$tiles[2]->visit();
		$tiles[3]->visit();

		$tileA = new Tile(1, 1, Tile::REPRESENTS_SPOT);
		$tileB = new Tile(1, 2, Tile::REPRESENTS_VOID);

		$this->assertEquals([$tileA, $tileB], $map->getUnvisitedTiles());
	}

	public function testDescribedByArray() {
		$description = [
			[1, 0],
			[0, 1],
		];

		$map = new Map($description);
		$this->assertEquals($description, $map->describedByArray());
	}

	public function testTileByPosition() {
		$description = [
			[1, 0],
			[0, 1],
		];

		$map = new Map($description);

		$row = 1;
		$column = 1;

		$position = new Position($row, $column);
		$tile = new Tile($row, $column, Tile::REPRESENTS_SPOT);

		$this->assertEquals($tile, $map->getTileByPosition($position));
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

//	public function testValidPosition() {
//		$description = [
//			[0, 1, 0, 1],
//			[1, 0, 0, 0],
//			[0, 0, 0, 1],
//			[0, 0, 0, 1]
//		];
//
//		$map = new Map($description);
//		$position = new Position(3, 1);
//		$this->assertTrue($map->hasValidPosition($position));
//	}
//
//	public function testInvalidPosition() {
//		$description = [
//			[0, 1, 0, 1],
//			[1, 0, 0, 0],
//			[0, 0, 0, 1],
//			[0, 0, 0, 1]
//		];
//
//		$map = new Map($description);
//		$position = new Position(4, 5);
//		$this->assertFalse($map->hasValidPosition($position));
//	}
//
//	public function testUnvisitedPosition() {
//		$description = [
//			[0, 1, 0, 1],
//			[1, 0, 0, 0],
//			[0, 0, 0, 1],
//			[0, 0, 0, 1]
//		];
//
//		$map = new Map($description);
//		$position = new Position(1, 1);
//		$this->assertFalse($map->isVisitedPosition($position));
//	}
//
//	public function testVisitedPosition() {
//		$description = [
//			[0, 1, 0, 1],
//			[1, 0, 0, 0],
//			[0, 0, 0, 1],
//			[0, 0, 0, 1]
//		];
//
//		$map = new Map($description);
//		$position = new Position(1, 1);
//		$map->visitPosition($position);
//		$this->assertTrue($map->isVisitedPosition($position));
//	}

}
