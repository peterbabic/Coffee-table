<?php

namespace Coffee;

// This is not necessary, since it is bootstrapped but serves for debugging purposes
require __DIR__ . '/../../vendor/autoload.php';

class TileTest extends \PHPUnit_Framework_TestCase {

	public function testRepresentsElement() {
		$tile = new Tile(2, 2, Tile::REPRESENTS_ELEMENT);

		$this->assertTrue($tile->representsElement());
	}

	public function testGetPosition() {
		$row = 2;
		$column = 2;

		$tile = new Tile($row, $column, Tile::REPRESENTS_VOID);
		$position = new Position($row, $column);

		$this->assertEquals($position, $tile->getPosition());

	}
}
