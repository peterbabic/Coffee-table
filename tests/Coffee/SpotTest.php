<?php

namespace Coffee;

// This is not necessary, since it is bootstrapped but serves for debugging purposes
require __DIR__ . '/../../vendor/autoload.php';

class SpotTest extends \PHPUnit_Framework_TestCase {

    public function testGetPositions() {
        $tile = new Tile(2, 1);
        $spot = new Spot($tile);

        $this->assertEquals([$tile], $spot->getTiles());
    }

    public function testSize() {
        $spot = new Spot(new Tile(1, 2));
        $spot->addTile(new Tile(1, 3));
        $spot->addTile(new Tile(2, 3));
        $spot->addTile(new Tile(3, 2));
        $spot->addTile(new Tile(4, 1));

        $this->assertEquals(5, $spot->getSize());
    }

    public function testGetNumber() {
        $spot = new Spot(new Tile(1, 2));
        $spot->setNumber(3);

        $tiles = $spot->getTiles();

        $this->assertEquals(3, $tiles[0]->getSpotNumber());
    }

}
