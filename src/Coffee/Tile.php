<?php

namespace Coffee;

/**
 * Class Tile
 *
 * @package Coffee
 */
class Tile {

	/**
	 * @var int
	 */
	private $column = 0;
	/**
	 * @var int
	 */
	private $row = 0;

	/**
	 * @param $column
	 * @param $row
	 */
	function __construct($column, $row) {
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
	 * @param Tile $tile
	 * @return bool
	 */
	public function isTheSameColumn(Tile $tile) {
		return $this->getColumn() == $tile->getColumn();
	}

	/**
	 * @param Tile $tile
	 * @return bool
	 */
	public function isTheSameRow(Tile $tile) {
		return $this->getRow() == $tile->getRow();
	}

	/**
	 * @param Tile $tile
	 * @return bool
	 */
	public function isTheSameTile(Tile $tile) {
		return $this->isTheSameColumn($tile) && $this->isTheSameRow($tile);
	}

	/**
	 * @return Tile
	 */
	public function getNorthEastTile() {
		return new Tile($this->getColumn() + 1, $this->getRow() - 1);
	}

	/**
	 * @return Tile
	 */
	public function getEastTile() {
		return new Tile($this->getColumn() + 1, $this->getRow());
}

	/**
	 * @return Tile
	 */
	public function getSouthEastTile() {
		return new Tile($this->getColumn() + 1, $this->getRow() + 1);
}

	/**
	 * @return Tile
	 */
	public function getSouthTile() {
		return new Tile($this->getColumn(), $this->getRow() + 1);
	}

	/**
	 * @return Tile
	 */
	public function getSouthWestTile() {
		return new Tile($this->getColumn() - 1, $this->getRow() + 1);
	}

	/**
	 * @return Tile
	 */
	public function getWestTile() {
		return new Tile($this->getColumn() - 1, $this->getRow());
	}

	/**
	 * @return Tile
	 */
	public function getNorthWestTile() {
		return new Tile($this->getColumn() - 1, $this->getRow() - 1);
	}

	/**
	 * @return Tile
	 */
	public function getNorthTile() {
		return new Tile($this->getColumn(), $this->getRow() - 1);
	}

}