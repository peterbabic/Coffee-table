<?php

namespace Coffee;

// This is not necessary, sice it is bootstrapped but serves for debugging purposes
require __DIR__ . '/../vendor/autoload.php';

class TileTest extends \PHPUnit_Framework_TestCase {



	public function testTheSameX() {
		$tileA = new Tile(2, 2);
		$tileB = new Tile(2, 2);

		$this->assertTrue($tileA->isTheSameColumn($tileB));
	}

	public function testTheSameY() {
		$tileA = new Tile(2, 2);
		$tileB = new Tile(2, 2);

		$this->assertTrue($tileA->isTheSameRow($tileB));
	}

	public function testTheSameTile() {
		$tileA = new Tile(2, 2);
		$tileB = new Tile(2, 2);

		$this->assertTrue($tileA->isTheSameTile($tileB));
	}

	public function testNorthEastTile() {
		$tile = new Tile(2, 2);
		$northEastTileA = $tile->getNorthEastTile();
		$northEastTileB = new Tile(1, 3);

		$this->assertTrue($northEastTileA->isTheSameTile($northEastTileB));
	}

	public function testEastTile() {
		$tile = new Tile(2, 2);
		$northTileA = $tile->getEastTile();
		$NorthTileB = new Tile(2, 3);

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
		$NorthTileB = new Tile(3, 2);

		$this->assertTrue($northTileA->isTheSameTile($NorthTileB));
	}

	public function testsSouthWestTile() {
		$tile = new Tile(2, 2);
		$northTileA = $tile->getSouthWestTile();
		$NorthTileB = new Tile(3, 1);

		$this->assertTrue($northTileA->isTheSameTile($NorthTileB));
	}

	public function testWestTile() {
		$tile = new Tile(2, 2);
		$northTileA = $tile->getWestTile();
		$NorthTileB = new Tile(2, 1);

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
		$NorthTileB = new Tile(1, 2);

		$this->assertTrue($northTileA->isTheSameTile($NorthTileB));
	}

	public function testNeighbors() {
		$tile = new Tile(2, 2);
		$neighbours = [
			new Tile(1, 3),
			new Tile(2, 3),
			new Tile(3, 3),
			new Tile(3, 2),
			new Tile(3, 1),
			new Tile(2, 1),
			new Tile(1, 1),
			new Tile(1, 2),
		];

		$this->assertEquals($neighbours, $tile->getNeighbors());
	}
}