<?php

namespace Coffee;

// This is not necessary, since it is bootstrapped but serves for debugging purposes
require __DIR__ . '/../../vendor/autoload.php';

class TableTest extends \PHPUnit_Framework_TestCase {


    public function testZeroSpotsCount() {
        $description = [
            [0, 0],
            [0, 0],
        ];

        $table = new Table($description);

        $this->assertEquals(0, $table->getSpotsCount());
    }

    public function testTwoSingleSpotsCount() {
        $description = [
            [0, 1, 0],
            [0, 0, 1],
            [1, 0, 0],
            [0, 1, 0],
        ];

        $table = new Table($description);

        $this->assertEquals(2, $table->getSpotsCount());
    }

    public function testMultipleLargeSpotsCount() {
        $description = [
            [0, 1, 1, 0, 0],
            [0, 0, 1, 0, 1],
            [0, 1, 0, 0, 1],
            [1, 1, 0, 0, 0],
            [1, 0, 0, 1, 1],
            [0, 0, 0, 0, 1],
            [0, 1, 0, 0, 0],
        ];

        $table = new Table($description);

        $this->assertEquals(4, $table->getSpotsCount());
    }

    public function testOneSmallSpot() {
        $description = [
            [0, 1, 1],
            [0, 0, 0],
            [0, 0, 0],
            [0, 0, 0],
        ];

        $table = new Table($description);
        $spot = new Spot(new Tile(1, 2));
        $spot->addTile(new Tile(1, 3));

        $this->assertEquals([$spot], $table->getSpots());
    }

    public function testOneLargeSpot() {
        $description = [
            [0, 1, 1],
            [0, 0, 1],
            [0, 1, 0],
            [1, 0, 0],
        ];

        $table = new Table($description);
        $spot = new Spot(new Tile(1, 2));
        $spot->addTile(new Tile(1, 3));
        $spot->addTile(new Tile(2, 3));
        $spot->addTile(new Tile(3, 2));
        $spot->addTile(new Tile(4, 1));

        $this->assertEquals([$spot], $table->getSpots());
    }

    public function testMultipleLargeSpots() {
        $description = [
            [0, 1, 1, 0, 0],
            [0, 0, 1, 0, 1],
            [0, 1, 0, 0, 1],
            [1, 0, 0, 1, 0],
        ];

        $table = new Table($description);

        $spotA = new Spot(new Tile(1, 2));
        $spotA->addTile(new Tile(1, 3));
        $spotA->addTile(new Tile(2, 3));
        $spotA->addTile(new Tile(3, 2));
        $spotA->addTile(new Tile(4, 1));

        $spotB = new Spot(new Tile(2, 5));
        $spotB->addTile(new Tile(3, 5));
        $spotB->addTile(new Tile(4, 4));

        $this->assertEquals([$spotA, $spotB], $table->getSpots());
    }

    public function testLargestSpotSize() {
        $description = [
            [0, 1, 1, 0, 0],
            [1, 1, 1, 0, 1],
            [0, 0, 1, 0, 1],
            [1, 0, 0, 0, 0],
        ];

        $table = new Table($description);

        $this->assertEquals(6, $table->getLargestSpot()->getSize());
    }

    public function testSpotNumberByPosition() {
        $description = [
            [0, 1, 1, 0, 0],
            [1, 1, 1, 0, 1],
            [0, 0, 1, 0, 1],
            [1, 0, 0, 0, 0],
        ];

        $table = new Table($description);
        $position = new Tile(4, 1);

        $this->assertEquals(2, $table->getSpotNumberByPosition($position));
    }
}
