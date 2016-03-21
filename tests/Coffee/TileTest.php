<?php

namespace Coffee;

// This is not necessary, since it is bootstrapped but serves for debugging purposes
require __DIR__ . '/../../vendor/autoload.php';

class TileTest extends \PHPUnit_Framework_TestCase {

    public function testRepresentingSpot() {
        $tile = new Tile(2, 2, Tile::REPRESENTS_SPOT);

        $this->assertTrue($tile->isRepresentingSpot());
    }

    public function testRepresentingVoid() {
        $tile = new Tile(2, 2, Tile::REPRESENTS_VOID);

        $this->assertTrue($tile->isRepresentingVoid());
    }

    public function testIsVisited() {
        $tile = new Tile(2, 2, Tile::REPRESENTS_SPOT);
        $tile->visit();

        $this->assertTrue($tile->isVisited());
    }

    public function testSpotNumber() {
        $tile = new Tile(2, 2, Tile::REPRESENTS_SPOT);
        $tile->setSpotNumber(4);

        $this->assertEquals(4, $tile->getSpotNumber());
    }

}
