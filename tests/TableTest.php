<?php

namespace Coffee;

// This is not necessary, sice it is bootstrapped but serves for debugging purposes
require __DIR__ . '/../vendor/autoload.php';

class TableTest extends \PHPUnit_Framework_TestCase {

	public function testGetSpots() {
		$tableMap = [
			[1, 0],
			[0, 1],
		];

		$tile = new Tile(0, 0);
		$spot = new Spot();
		$table = new Table($tableMap);
		$spot->addTile($tile);
		$table->addSpot($spot);
		$this->assertEquals([$spot], $table->getSpots());
	}

	public function testSpotsCount() {
		$tableMap = [
			[1, 0],
			[0, 1],
		];

		$tile = new Tile(0, 0);
		$spot = new Spot();
		$table = new Table($tableMap);
		$spot->addTile($tile);
		$table->addSpot($spot);
		$table->addSpot($spot);
		$this->assertEquals(2, $table->getSpotsCount());
	}

//	public function testRemoveMapCoordinate() {
//		$tableMap = [
//			[1, 0],
//			[0, 1],
//		];
//
//		$table = new Table($tableMap);
//		$table->processCoordinate(0, 0);
//
//		$processedTableMap = [
//			[0],
//			[0, 1],
//		];
//
//		$this->assertEquals($processedTableMap, $table->getRemainingPositions());
//	}

//	public function testConvertCoffeeTileToSpot() {
//		$tableMap = [
//			[1, 0],
//			[0, 1],
//		];
//
//		$tile = new Tile(0, 0);
//		$spot = new Spot();
//		$table = new Table($tableMap);
//		$spot->addTile($tile);
//		$table->addSpot($spot);
//		$table->addSpot($spot);
//		$this->assertEquals(2, $table->getSpotsCount());
//	}
}
