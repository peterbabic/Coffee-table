<?php

namespace Coffee;

class TileTest extends \PHPUnit_Framework_TestCase {



	public function testTheSameX() {
		$tileA = new Tile(2, 2);
		$tileB = new Tile(2, 2);

		$this->assertTrue($tileA->isTheSameX($tileB));
	}

	public function testTheSameY() {
		$tileA = new Tile(2, 2);
		$tileB = new Tile(2, 2);

		$this->assertTrue($tileA->isTheSameY($tileB));
	}

	public function testTheSameTile() {
		$tileA = new Tile(2, 2);
		$tileB = new Tile(2, 2);

		$this->assertTrue($tileA->isTheSameTile($tileB));
	}

	public function testNorthEastTile() {
		$tile = new Tile(2, 2);
		$northEastTileA = $tile->getNorthEastTile();
		$northEastTileB = new Tile(3, 1);

		$this->assertTrue($northEastTileA->isTheSameTile($northEastTileB));
	}

	public function testEastTile() {
		$tile = new Tile(2, 2);
		$northTileA = $tile->getEastTile();
		$NorthTileB = new Tile(3, 2);

		$this->assertTrue($northTileA->isTheSameTile($NorthTileB));
	}

	public function testSouthEastTile() {
		$tile = new Tile(2, 2);
		$northTileA = $tile->getSouthEastTile();
		$NorthTileB = new Tile(3, 3);

		$this->assertTrue($northTileA->isTheSameTile($NorthTileB));
	}

	public function testSouthTile() {
		$tile = new Tile(2, 2);
		$northTileA = $tile->getSouthTile();
		$NorthTileB = new Tile(2, 3);

		$this->assertTrue($northTileA->isTheSameTile($NorthTileB));
	}

	public function testsSouthWestTile() {
		$tile = new Tile(2, 2);
		$northTileA = $tile->getSouthWestTile();
		$NorthTileB = new Tile(1, 3);

		$this->assertTrue($northTileA->isTheSameTile($NorthTileB));
	}

	public function testWestTile() {
		$tile = new Tile(2, 2);
		$northTileA = $tile->getWestTile();
		$NorthTileB = new Tile(1, 2);

		$this->assertTrue($northTileA->isTheSameTile($NorthTileB));
	}

	public function testNorthWestTile() {
		$tile = new Tile(2, 2);
		$northTileA = $tile->getNorthWestTile();
		$NorthTileB = new Tile(1, 1);

		$this->assertTrue($northTileA->isTheSameTile($NorthTileB));
	}

	public function testNorthTile() {
		$tile = new Tile(2, 2);
		$northTileA = $tile->getNorthTile();
		$NorthTileB = new Tile(2, 1);

		$this->assertTrue($northTileA->isTheSameTile($NorthTileB));
	}

//	public function testNorthOf() {
//		$tileA = new Tile(2, 2);
//		$tileB = new Tile(2, 1);
//
//		$this->assertTrue($tileA->isNorthOf($tileB));
//	}
//
//	public function testSouthOf() {
//		$tileA = new Tile(2, 1);
//		$tileB = new Tile(2, 2);
//
//		$this->assertTrue($tileA->isSouthOf($tileB));
//	}
//
//	public function testEastOf() {
//		$tileA = new Tile(2, 2);
//		$tileB = new Tile(1, 2);
//
//		$this->assertTrue($tileA->isEastOf($tileB));
//	}
//
//	public function testWestOf() {
//		$tileA = new Tile(1, 2);
//		$tileB = new Tile(2, 2);
//
//		$this->assertTrue($tileA->isWestOf($tileB));
//	}
//
//	public function testNorthEastOf() {
//		$tileA = new Tile(2, 2);
//		$tileB = new Tile(1, 1);
//
//		$this->assertTrue($tileA->isNorthEastOf($tileB));
//	}
//
//	public function testNorthWestOf() {
//		$tileA = new Tile(1, 2);
//		$tileB = new Tile(2, 1);
//
//		$this->assertTrue($tileA->isNorthWestOf($tileB));
//	}
//
//	public function testSouthEastOf() {
//		$tileA = new Tile(2, 1);
//		$tileB = new Tile(1, 2);
//
//		$this->assertTrue($tileA->isSouthEastOf($tileB));
//	}
//
//	public function testSouthWestOf() {
//		$tileA = new Tile(1, 1);
//		$tileB = new Tile(2, 2);
//
//		$this->assertTrue($tileA->isSouthWestOf($tileB));
//	}
//
//	public function testNeighborOf() {
//		$tileA = new Tile(1, 1);
//		$tileB = new Tile(2, 2);
//
//		$this->assertTrue($tileA->isNeighborOf($tileB));
//	}

}