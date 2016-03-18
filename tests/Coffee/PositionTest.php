<?php

namespace Coffee;

// This is not necessary, since it is bootstrapped but serves for debugging purposes
require __DIR__ . '/../../vendor/autoload.php';

class PositionTest extends \PHPUnit_Framework_TestCase {

	public function testColumnIndex() {
		$position = new Position(2, 2);

		$this->assertEquals(1, $position->getColumnIndex());
	}

	public function testRowIndex() {
		$position = new Position(2, 2);

		$this->assertEquals(1, $position->getRowIndex());
	}

	public function testTheSameX() {
		$positionA = new Position(2, 2);
		$positionB = new Position(2, 2);

		$this->assertTrue($positionA->isTheSameColumn($positionB));
	}

	public function testTheSameY() {
		$positionA = new Position(2, 2);
		$positionB = new Position(2, 2);

		$this->assertTrue($positionA->isTheSameRow($positionB));
	}

	public function testTheSamePosition() {
		$positionA = new Position(2, 2);
		$positionB = new Position(2, 2);

		$this->assertTrue($positionA->isTheSamePosition($positionB));
	}

	public function testNorthEastPosition() {
		$position = new Position(2, 2);
		$northEastPositionA = $position->getNorthEastPosition();
		$northEastPositionB = new Position(1, 3);

		$this->assertTrue($northEastPositionA->isTheSamePosition($northEastPositionB));
	}

	public function testEastPosition() {
		$position = new Position(2, 2);
		$northPositionA = $position->getEastPosition();
		$northPositionB = new Position(2, 3);

		$this->assertTrue($northPositionA->isTheSamePosition($northPositionB));
	}

	public function testSouthEastPosition() {
		$position = new Position(2, 2);
		$northPositionA = $position->getSouthEastPosition();
		$northPositionB = new Position(3, 3);

		$this->assertTrue($northPositionA->isTheSamePosition($northPositionB));
	}

	public function testSouthPosition() {
		$position = new Position(2, 2);
		$northPositionA = $position->getSouthPosition();
		$northPositionB = new Position(3, 2);

		$this->assertTrue($northPositionA->isTheSamePosition($northPositionB));
	}

	public function testsSouthWestPosition() {
		$position = new Position(2, 2);
		$northPositionA = $position->getSouthWestPosition();
		$northPositionB = new Position(3, 1);

		$this->assertTrue($northPositionA->isTheSamePosition($northPositionB));
	}

	public function testWestPosition() {
		$position = new Position(2, 2);
		$northPositionA = $position->getWestPosition();
		$northPositionB = new Position(2, 1);

		$this->assertTrue($northPositionA->isTheSamePosition($northPositionB));
	}

	public function testNorthWestPosition() {
		$position = new Position(2, 2);
		$northPositionA = $position->getNorthWestPosition();
		$northPositionB = new Position(1, 1);

		$this->assertTrue($northPositionA->isTheSamePosition($northPositionB));
	}

	public function testNorthPosition() {
		$position = new Position(2, 2);
		$northPositionA = $position->getNorthPosition();
		$northPositionB = new Position(1, 2);

		$this->assertTrue($northPositionA->isTheSamePosition($northPositionB));
	}

	public function testOpenSpaceNeighbours() {
		$position = new Position(2, 2);
		// Neighbours from NE to N, in CW direction
		$neighbours = [
			new Position(1, 3),
			new Position(2, 3),
			new Position(3, 3),
			new Position(3, 2),
			new Position(3, 1),
			new Position(2, 1),
			new Position(1, 1),
			new Position(1, 2),
		];

		$this->assertEquals($neighbours, $position->getNeighbouringPositions());
	}

	public function testCornerNeighbours() {
		$position = new Position(1, 1);
		// Return just E, SE and S neighbours
		$neighbours = [
			new Position(1, 2),
			new Position(2, 2),
			new Position(2, 1),
		];

		$this->assertEquals($neighbours, $position->getNeighbouringPositions());
	}
}