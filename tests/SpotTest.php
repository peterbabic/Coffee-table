<?php

namespace Coffee;

// This is not necessary, since it is bootstrapped but serves for debugging purposes
require __DIR__ . '/../vendor/autoload.php';

class SpotTest extends \PHPUnit_Framework_TestCase {

	public function testGetPositions() {
		$position = new Position(2, 1);
		$spot = new Spot();
		$spot->addPosition($position);

		$this->assertEquals([$position], $spot->getPositions());
	}
}
