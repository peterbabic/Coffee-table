<?php

namespace Coffee;
/**
 * Created by PhpStorm.
 * User: delmadord
 * Date: 3/16/16
 * Time: 7:59 AM
 */
class TableTest extends \PHPUnit_Framework_TestCase {

	public function testRemainingTiles() {
		$tableMap = [
			[0, 1],
			[1, 0],
		];

		$table = new Table($tableMap);
		$this->assertEquals($tableMap, $table->getRemainingPositions());
	}

	public function testHeight() {
		$tableMap = [
			[0, 1, 0, 1],
			[1, 0, 0, 0],
			[0, 0, 0, 1],
			[0, 0, 0, 1]
		];

		$table = new Table($tableMap);
		$this->assertEquals(4, $table->getHeight());
	}

	public function testWidth() {
		$tableMap = [
			[0, 1, 0],
			[1, 0, 0, 0],
			[0, 0, 0],
			[0, 0, 0]
		];

		$table = new Table($tableMap);
		$this->assertEquals(4, $table->getWidth());
	}

	public function testTileLiesOnTable() {
		$tableMap = [
			[0, 1],
			[1, 0],
		];

		$table = new Table($tableMap);
		$tile = new Tile(0, 0);
		$this->assertTrue($table->couldContainTile($tile));
	}

	public function testTileLiesOutsideTable() {
		$tableMap = [
			[0, 1],
			[1, 0],
		];

		$table = new Table($tableMap);
		$tile = new Tile(2, 1);
		$this->assertFalse($table->couldContainTile($tile));
	}

	public function testGetSpots() {
		$tableMap = [
			[0, 1],
			[1, 0],
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
			[0, 1],
			[1, 0],
		];

		$tile = new Tile(0, 0);
		$spot = new Spot();
		$table = new Table($tableMap);
		$spot->addTile($tile);
		$table->addSpot($spot);
		$table->addSpot($spot);
		$this->assertEquals(2, $table->getSpotsCount());
	}
}
