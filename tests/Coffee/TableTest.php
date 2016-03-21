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

    public function testOneSmallSpot() {
        $table = new Table([
            [0, 1, 1],
            [0, 0, 0],
            [0, 0, 0],
            [0, 0, 0],
        ]);

        $spot = new Spot($this->newVisitedTile(1, 2));
        $spot->addTile($this->newVisitedTile(1, 3));
        $spot->setNumber(1);

        $this->assertEquals([$spot], $table->getSpots());
    }

    public function testOneLargeSpot() {
        $table = new Table([
            [0, 1, 1],
            [0, 0, 1],
            [0, 1, 0],
            [1, 0, 0],
        ]);

        $spot = new Spot($this->newVisitedTile(1, 2));
        $spot->addTile($this->newVisitedTile(1, 3));
        $spot->addTile($this->newVisitedTile(2, 3));
        $spot->addTile($this->newVisitedTile(3, 2));
        $spot->addTile($this->newVisitedTile(4, 1));
        $spot->setNumber(1);

        $this->assertEquals([$spot], $table->getSpots());
    }

    public function testMultipleLargeSpots() {
        $table = new Table([
            [0, 1, 1, 0, 0],
            [0, 0, 1, 0, 1],
            [0, 1, 0, 0, 1],
            [1, 0, 0, 1, 0],
        ]);

        $spotA = new Spot($this->newVisitedTile(1, 2));
        $spotA->addTile($this->newVisitedTile(1, 3));
        $spotA->addTile($this->newVisitedTile(2, 3));
        $spotA->addTile($this->newVisitedTile(3, 2));
        $spotA->addTile($this->newVisitedTile(4, 1));
        $spotA->setNumber(1);

        $spotB = new Spot($this->newVisitedTile(2, 5));
        $spotB->addTile($this->newVisitedTile(3, 5));
        $spotB->addTile($this->newVisitedTile(4, 4));
        $spotB->setNumber(2);

        $this->assertEquals([$spotA, $spotB], $table->getSpots());
    }

    public function testLargestSpotSize() {
        $table = new Table([
            [0, 1, 1, 0, 0],
            [1, 1, 1, 0, 1],
            [0, 0, 1, 0, 1],
            [1, 0, 0, 0, 0],
        ]);

        $this->assertEquals(6, $table->getLargestSpot()->getSize());
    }

    /**
     * Wrapper for a visited tile to reduce repetition. This logic does not fit into the Spot class.
     *
     * @param $row
     * @param $column
     * @return Tile
     */
    protected function newVisitedTile($row, $column) {
        return new Tile($row, $column, Tile::REPRESENTS_SPOT, true);
    }

}
