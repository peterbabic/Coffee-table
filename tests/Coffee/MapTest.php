<?php

namespace Coffee;

// This is not necessary, since it is bootstrapped but serves for debugging purposes
require __DIR__ . '/../../vendor/autoload.php';

class MapTest extends \PHPUnit_Framework_TestCase {

    public function testGetTiles() {
        $tileA = new Tile(1, 1, Tile::REPRESENTS_SPOT);
        $tileB = new Tile(1, 2, Tile::REPRESENTS_VOID);
        $tileC = new Tile(2, 1, Tile::REPRESENTS_VOID);
        $tileD = new Tile(2, 2, Tile::REPRESENTS_SPOT);
        $tiles = [$tileA, $tileB, $tileC, $tileD];

        $map = new Map([
            [1, 0],
            [0, 1],
        ]);

        $this->assertEquals($tiles, $map->getTiles());
    }

    public function testGetStructuredTiles() {
        $tileA = new Tile(1, 1, Tile::REPRESENTS_SPOT);
        $tileB = new Tile(1, 2, Tile::REPRESENTS_VOID);
        $tileC = new Tile(2, 1, Tile::REPRESENTS_VOID);
        $tileD = new Tile(2, 2, Tile::REPRESENTS_SPOT);
        $tiles = [
            [$tileA, $tileB],
            [$tileC, $tileD],
        ];

        $map = new Map([
            [1, 0],
            [0, 1],
        ]);

        $this->assertEquals($tiles, $map->getStructuredTiles());
    }

    public function testTileByPosition() {
        $map = new Map([
            [1, 0],
            [0, 1],
        ]);

        $row = 1;
        $column = 1;

        $position = new Tile($row, $column);
        $tile = new Tile($row, $column, Tile::REPRESENTS_SPOT);

        $this->assertEquals($tile, $map->getTileByPosition($position));
    }

    public function testHeight() {
        $map = new Map([
            [0, 1, 0, 1],
            [1, 0, 0, 0],
            [0, 0, 0, 1],
            [0, 0, 0, 1]
        ]);

        $this->assertEquals(4, $map->getHeight());
    }

    public function testWidth() {
        $map = new Map([
            [0, 1, 0, 1],
            [1, 0, 0, 0],
            [0, 0, 0, 1],
            [0, 0, 0, 1]
        ]);

        $this->assertEquals(4, $map->getWidth());
    }

    public function testNeighboursOfTile() {
        $map = new Map([
            [0, 1, 0, 1],
            [1, 0, 0, 0],
            [0, 0, 0, 1],
            [0, 0, 0, 1]
        ]);

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
