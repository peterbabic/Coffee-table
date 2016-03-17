<?php

namespace Coffee;

/**
 * Class Position
 *
 * @package Coffee
 */
class Position {

	/**
	 * @var int
	 */
	private $column = 0;
	/**
	 * @var int
	 */
	private $row = 0;

	/**
	 * @param $row
	 * @param $column
	 */
	function __construct($row, $column) {
		$this->column = $column;
		$this->row = $row;
	}

	/**
	 * @return int
	 */
	public function getColumn() {
		return $this->column;
	}

	/**
	 * @return int
	 */
	public function getRow() {
		return $this->row;
	}

	/**
	 * @param Position $position
	 * @return bool
	 */
	public function isTheSameColumn(Position $position) {
		return $this->getColumn() == $position->getColumn();
	}

	/**
	 * @param Position $position
	 * @return bool
	 */
	public function isTheSameRow(Position $position) {
		return $this->getRow() == $position->getRow();
	}

	/**
	 * @param Position $position
	 * @return bool
	 */
	public function isTheSamePosition(Position $position) {
		return $this->isTheSameColumn($position) && $this->isTheSameRow($position);
	}

	/**
	 * @return Position
	 */
	public function getNorthEastPosition() {
		return new Position($this->getRow() - 1, $this->getColumn() + 1);
	}

	/**
	 * @return Position
	 */
	public function getEastPosition() {
		return new Position($this->getRow(), $this->getColumn() + 1);
}

	/**
	 * @return Position
	 */
	public function getSouthEastPosition() {
		return new Position($this->getRow() + 1, $this->getColumn() + 1);
}

	/**
	 * @return Position
	 */
	public function getSouthPosition() {
		return new Position($this->getRow() + 1, $this->getColumn());
	}

	/**
	 * @return Position
	 */
	public function getSouthWestPosition() {
		return new Position($this->getRow() + 1, $this->getColumn() - 1);
	}

	/**
	 * @return Position
	 */
	public function getWestPosition() {
		return new Position($this->getRow(), $this->getColumn() - 1);
	}

	/**
	 * @return Position
	 */
	public function getNorthWestPosition() {
		return new Position($this->getRow() - 1, $this->getColumn() - 1);
	}

	/**
	 * @return Position
	 */
	public function getNorthPosition() {
		return new Position($this->getRow() - 1, $this->getColumn());
	}

	/**
	 * @return array    Neighbors of position from NE to N; CW direction
	 */
	public function getNeighbors() {
		return [
			$this->getNorthEastPosition(),
			$this->getEastPosition(),
			$this->getSouthEastPosition(),
			$this->getSouthPosition(),
			$this->getSouthWestPosition(),
			$this->getWestPosition(),
			$this->getNorthWestPosition(),
			$this->getNorthPosition(),
		];
	}

}