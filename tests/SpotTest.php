<?php

namespace Coffee;

// This is not necessary, sice it is bootstrapped but serves for debugging purposes
require __DIR__ . '/../vendor/autoload.php';

class SpotTest extends \PHPUnit_Framework_TestCase {

	public function testGetTiles() {
		$tile = new Tile(2, 1);
		$spot = new Spot();
		$spot->addTile($tile);

		$this->assertEquals([$tile], $spot->getTiles());
	}
}
