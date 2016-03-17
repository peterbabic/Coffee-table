<?php

namespace Coffee;

/**
 * Class Position
 *
 * @package Coffee
 */
/**
 * Class Position
 *
 * @package Coffee
 */
class Position {

	/**
	 * The lowest possible position for rows and columns
	 */
	const LOWER_BOUND = 1;

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
	 * @throws \Exception
	 */
	function __construct($row, $column) {
		if (!$this->fitsIntoLowerBound($row, $column)) {
			throw new \Exception('The row argument must be higher than ' . self::LOWER_BOUND . '.');
		}

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
	public function getColumnIndex() {
		return $this->column - 1;
	}

	/**
	 * @return int
	 */
	public function getRow() {
		return $this->row;
	}

	/**
	 * @return int
	 */
	public function getRowIndex() {
		return $this->row - 1;
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
		return $this->getSafeNeighbor($this->getRow() - 1, $this->getColumn() + 1);
	}

	/**
	 * @return Position
	 */
	public function getEastPosition() {
		return $this->getSafeNeighbor($this->getRow(), $this->getColumn() + 1);
	}

	/**
	 * @return Position
	 */
	public function getSouthEastPosition() {
		return $this->getSafeNeighbor($this->getRow() + 1, $this->getColumn() + 1);
	}

	/**
	 * @return Position
	 */
	public function getSouthPosition() {
		return $this->getSafeNeighbor($this->getRow() + 1, $this->getColumn());
	}

	/**
	 * @return Position
	 */
	public function getSouthWestPosition() {
		return $this->getSafeNeighbor($this->getRow() + 1, $this->getColumn() - 1);
	}

	/**
	 * @return Position
	 */
	public function getWestPosition() {
		return $this->getSafeNeighbor($this->getRow(), $this->getColumn() - 1);
	}

	/**
	 * @return Position
	 */
	public function getNorthWestPosition() {
		return $this->getSafeNeighbor($this->getRow() - 1, $this->getColumn() - 1);
	}

	/**
	 * @return Position
	 */
	public function getNorthPosition() {
		return $this->getSafeNeighbor($this->getRow() - 1, $this->getColumn());
	}

	/**
	 * @return array    Neighbors of position from NE to N; CW direction
	 */
	public function getNeighbors() {

		// null values from out-of-lower-bound neighbors are filtered out and indices are fixed
		return array_values(array_filter([
			$this->getNorthEastPosition(),
			$this->getEastPosition(),
			$this->getSouthEastPosition(),
			$this->getSouthPosition(),
			$this->getSouthWestPosition(),
			$this->getWestPosition(),
			$this->getNorthWestPosition(),
			$this->getNorthPosition(),
		]));
	}

	/**
	 * @param $row
	 * @param $column
	 * @return bool
	 */
	private function fitsIntoLowerBound($row, $column) {
		if ($row < self::LOWER_BOUND || $column < self::LOWER_BOUND) {
			return false;
		}

		return true;
	}

	/**
	 * @param $row
	 * @param $column
	 * @return Position|null
	 */
	private function getSafeNeighbor($row, $column) {
		if ($this->fitsIntoLowerBound($row, $column)) {
			return new Position($row, $column);
		}

		return null;
	}

}