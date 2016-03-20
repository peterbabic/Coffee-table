<?php

namespace Coffee;

// This is not necessary, since it is bootstrapped but serves for debugging purposes
require __DIR__ . '/../../vendor/autoload.php';

class SpotTest extends \PHPUnit_Framework_TestCase {

    public function testGetPositions() {
        $position = new Position(2, 1);
        $spot = new Spot($position);

        $this->assertEquals([$position], $spot->getPositions());
    }

    public function testSize() {
        $spotA = new Spot(new Position(1, 2));
        $spotA->addPosition(new Position(1, 3));
        $spotA->addPosition(new Position(2, 3));
        $spotA->addPosition(new Position(3, 2));
        $spotA->addPosition(new Position(4, 1));

        $this->assertEquals(5, $spotA->getSize());
    }

}
