<?php

namespace Coffee;

// This is not necessary, since it is bootstrapped but serves for debugging purposes
require __DIR__ . '/../../vendor/autoload.php';

class TableTest extends \PHPUnit_Framework_TestCase {

//
//	public function testGetSpots() {
//		$table = new Table();
//		$table->addSpot($spot);
//		$this->assertEquals([$spot], $table->getSpots());
//	}

	public function testZeroSpotsCount() {
		$description = [
			[0, 0],
			[0, 0],
		];

		$map = new Map($description);
		$table = new Table($map);

		$this->assertEquals(0, $table->getSpotsCount());
	}

	public function testTwoSingleSpotsCount() {
		$description = [
			[0, 1, 0],
			[0, 0, 0],
			[1, 0, 0],
			[0, 0, 0],
		];

		$map = new Map($description);
		$table = new Table($map);

		$this->assertEquals(2, $table->getSpotsCount());
	}


}
