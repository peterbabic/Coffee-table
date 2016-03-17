<?php

namespace Coffee;

// This is not necessary, since it is bootstrapped but serves for debugging purposes
require __DIR__ . '/../../vendor/autoload.php';

class TileTest extends \PHPUnit_Framework_TestCase {

	public function testContainsElement() {
		$tile = new Tile(2, 2, true);

		$this->assertTrue($tile->representsElement());
	}
}
