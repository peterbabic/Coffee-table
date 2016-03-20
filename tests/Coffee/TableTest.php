<?php

namespace Coffee;

// This is not necessary, since it is bootstrapped but serves for debugging purposes
require __DIR__ . '/../../vendor/autoload.php';

class TableTest extends \PHPUnit_Framework_TestCase {

    public function testZeroSpotsCount() {
        $table = new Table([
            [0, 0],
            [0, 0],
        ]);

        $this->assertEquals(0, $table->getSpotsCount());
    }

    public function testTwoSingleSpotsCount() {
        $table = new Table([
            [0, 1, 0],
            [0, 0, 1],
            [1, 0, 0],
            [0, 1, 0],
        ]);

        $this->assertEquals(2, $table->getSpotsCount());
    }

    public function testMultipleLargeSpotsCount() {
        $table = new Table([
            [0, 1, 1, 0, 0],
            [0, 0, 1, 0, 1],
            [0, 1, 0, 0, 1],
            [1, 1, 0, 0, 0],
            [1, 0, 0, 1, 1],
            [0, 0, 0, 0, 1],
            [0, 1, 0, 0, 0],
        ]);

        $this->assertEquals(4, $table->getSpotsCount());
    }

//    public function testOneSmallSpot() {
//        $table = new Table([
//            [0, 1, 1],
//            [0, 0, 0],
//            [0, 0, 0],
//            [0, 0, 0],
//        ]);
//
//        $spot = new Spot(new Tile(1, 2));
//        $spot->addTile(new Tile(1, 3));
//
//        $this->assertEquals([$spot], $table->getSpots());
//    }
//
//    public function testOneLargeSpot() {
//        $table = new Table([
//            [0, 1, 1],
//            [0, 0, 1],
//            [0, 1, 0],
//            [1, 0, 0],
//        ]);
//
//        $spot = new Spot(new Tile(1, 2));
//        $spot->addTile(new Tile(1, 3));
//        $spot->addTile(new Tile(2, 3));
//        $spot->addTile(new Tile(3, 2));
//        $spot->addTile(new Tile(4, 1));
//
//        $this->assertEquals([$spot], $table->getSpots());
//    }
//
//    public function testMultipleLargeSpots() {
//        $table = new Table([
//            [0, 1, 1, 0, 0],
//            [0, 0, 1, 0, 1],
//            [0, 1, 0, 0, 1],
//            [1, 0, 0, 1, 0],
//        ]);
//
//        $spotA = new Spot(new Tile(1, 2));
//        $spotA->addTile(new Tile(1, 3));
//        $spotA->addTile(new Tile(2, 3));
//        $spotA->addTile(new Tile(3, 2));
//        $spotA->addTile(new Tile(4, 1));
//
//        $spotB = new Spot(new Tile(2, 5));
//        $spotB->addTile(new Tile(3, 5));
//        $spotB->addTile(new Tile(4, 4));
//
//        $this->assertEquals([$spotA, $spotB], $table->getSpots());
//    }

    public function testLargestSpotSize() {
        $table = new Table([
            [0, 1, 1, 0, 0],
            [1, 1, 1, 0, 1],
            [0, 0, 1, 0, 1],
            [1, 0, 0, 0, 0],
        ]);

        $this->assertEquals(6, $table->getLargestSpot()->getSize());
    }

//    public function testSpotNumberByPosition() {
//        $table = new Table([
//            [0, 1, 1, 0, 0],
//            [1, 1, 1, 0, 1],
//            [0, 0, 1, 0, 1],
//            [1, 0, 0, 0, 0],
//        ]);
//
//        $position = new Tile(4, 1);
//
//        $this->assertEquals(2, $table->getSpotNumberByPosition($position));
//    }
}
