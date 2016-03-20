<?php

namespace Coffee;

// This is not necessary, since it is bootstrapped but serves for debugging purposes
require __DIR__ . '/../../vendor/autoload.php';

class TableTest extends \PHPUnit_Framework_TestCase {


    public function testZeroSpotsCount() {
        $map = new Map([
            [0, 0],
            [0, 0],
        ]);

        $table = new Table($map);

        $this->assertEquals(0, $table->getSpotsCount());
    }

    public function testTwoSingleSpotsCount() {
        $map = new Map([
            [0, 1, 0],
            [0, 0, 1],
            [1, 0, 0],
            [0, 1, 0],
        ]);

        $table = new Table($map);

        $this->assertEquals(2, $table->getSpotsCount());
    }

    public function testMultipleLargeSpotsCount() {
        $map = new Map([
            [0, 1, 1, 0, 0],
            [0, 0, 1, 0, 1],
            [0, 1, 0, 0, 1],
            [1, 1, 0, 0, 0],
            [1, 0, 0, 1, 1],
            [0, 0, 0, 0, 1],
            [0, 1, 0, 0, 0],
        ]);

        $table = new Table($map);

        $this->assertEquals(4, $table->getSpotsCount());
    }

    public function testOneSmallSpot() {
        $map = new Map([
            [0, 1, 1],
            [0, 0, 0],
            [0, 0, 0],
            [0, 0, 0],
        ]);

        $table = new Table($map);
        $spot = new Spot(new Position(1, 2));
        $spot->addPosition(new Position(1, 3));

        $this->assertEquals([$spot], $table->getSpots());
    }

    public function testOneLargeSpot() {
        $map = new Map([
            [0, 1, 1],
            [0, 0, 1],
            [0, 1, 0],
            [1, 0, 0],
        ]);

        $table = new Table($map);
        $spot = new Spot(new Position(1, 2));
        $spot->addPosition(new Position(1, 3));
        $spot->addPosition(new Position(2, 3));
        $spot->addPosition(new Position(3, 2));
        $spot->addPosition(new Position(4, 1));

        $this->assertEquals([$spot], $table->getSpots());
    }

    public function testMultipleLargeSpots() {
        $map = new Map([
            [0, 1, 1, 0, 0],
            [0, 0, 1, 0, 1],
            [0, 1, 0, 0, 1],
            [1, 0, 0, 1, 0],
        ]);

        $table = new Table($map);

        $spotA = new Spot(new Position(1, 2));
        $spotA->addPosition(new Position(1, 3));
        $spotA->addPosition(new Position(2, 3));
        $spotA->addPosition(new Position(3, 2));
        $spotA->addPosition(new Position(4, 1));

        $spotB = new Spot(new Position(2, 5));
        $spotB->addPosition(new Position(3, 5));
        $spotB->addPosition(new Position(4, 4));

        $this->assertEquals([$spotA, $spotB], $table->getSpots());
    }

    public function testLargestSpotSize() {
        $map = new Map([
            [0, 1, 1, 0, 0],
            [1, 1, 1, 0, 1],
            [0, 0, 1, 0, 1],
            [1, 0, 0, 0, 0],
        ]);

        $table = new Table($map);

        $this->assertEquals(6, $table->getLargestSpotSize());
    }

//    public function testSpotIndexByPosition() {
//        $map = new Map([
//            [0, 1, 1, 0, 0],
//            [1, 1, 1, 0, 1],
//            [0, 0, 1, 0, 1],
//            [1, 0, 0, 0, 0],
//        ]);
//
//        $table = new Table($map);
//        $position = new Position(1, 2);
//
//        $this->assertEquals(1, $table->getSpotIndexByPosition($position));
//    }
}
