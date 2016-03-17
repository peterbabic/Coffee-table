<?php

namespace Coffee;

// This is not necessary, since it is bootstrapped but serves for debugging purposes
require __DIR__ . '/../vendor/autoload.php';

class TableTest extends \PHPUnit_Framework_TestCase {

	public function testGetSpots() {

		$position = new Position(0, 0);
		$spot = new Spot();
		$table = new Table();
		$spot->addPosition($position);
		$table->addSpot($spot);
		$this->assertEquals([$spot], $table->getSpots());
	}

	public function testSpotsCount() {

		$position = new Position(0, 0);
		$spot = new Spot();
		$table = new Table();
		$spot->addPosition($position);
		$table->addSpot($spot);
		$table->addSpot($spot);
		$this->assertEquals(2, $table->getSpotsCount());
	}


}
