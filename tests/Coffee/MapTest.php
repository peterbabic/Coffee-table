<?php

namespace Coffee;

// This is not necessary, since it is bootstrapped but serves for debugging purposes
require __DIR__ . '/../../vendor/autoload.php';

class MapTest extends \PHPUnit_Framework_TestCase {

    public function testGetTiles() {
        $tileA = new Tile(1, 1, Tile::REPRESENTS_SPOT);
        $tileB = new Tile(1, 2, Tile::REPRESENTS_VOID);

        $map = new Map([[1, 0]]);
        $this->assertEquals([$tileA, $tileB], $map->getTiles());
    }

    public function testTileByPosition() {
        $description = [
            [1, 0],
            [0, 1],
        ];

        $map = new Map($description);

        $row = 1;
        $column = 1;

        $position = new Tile($row, $column);
        $tile = new Tile($row, $column, Tile::REPRESENTS_SPOT);

        $this->assertEquals($tile, $map->getTileByPosition($position));
    }

    public function testHeight() {
        $description = [
            [0, 1, 0, 1],
            [1, 0, 0, 0],
            [0, 0, 0, 1],
            [0, 0, 0, 1]
        ];

        $map = new Map($description);
        $this->assertEquals(4, $map->getHeight());
    }

    public function testWidth() {
        $description = [
            [0, 1, 0, 1],
            [1, 0, 0, 0],
            [0, 0, 0, 1],
            [0, 0, 0, 1]
        ];

        $map = new Map($description);
        $this->assertEquals(4, $map->getWidth());
    }

    public function testNeighboursOfTile() {
        $description = [
            [0, 1, 0, 1],
            [1, 0, 0, 0],
            [0, 0, 0, 1],
            [0, 0, 0, 1]
        ];

        $map = new Map($description);
        $position = new Tile(4, 4);
        $tile = $map->getTileByPosition($position);

        $neighbours = [
            new Tile(4, 3, Tile::REPRESENTS_VOID),
            new Tile(3, 3, Tile::REPRESENTS_VOID),
            new Tile(3, 4, Tile::REPRESENTS_SPOT),
        ];

        $this->assertEquals($neighbours, $map->getNeighboursOfTile($tile));

    }

}
