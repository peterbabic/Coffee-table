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
	private $X = 0;
	/**
	 * @var int
	 */
	private $Y = 0;

	/**
	 * @param $X
	 * @param $Y
	 */
	function __construct($X, $Y) {
		$this->X = $X;
		$this->Y = $Y;
	}

	/**
	 * @return int
	 */
	public function getX() {
		return $this->X;
	}

	/**
	 * @return int
	 */
	public function getY() {
		return $this->Y;
	}

	/**
	 * @param Tile $tile
	 * @return bool
	 */
	public function isTheSameX(Tile $tile) {
		return $this->getX() == $tile->getX();
	}

	/**
	 * @param Tile $tile
	 * @return bool
	 */
	public function isTheSameY(Tile $tile) {
		return $this->getY() == $tile->getY();
	}

	/**
	 * @param Tile $tile
	 * @return bool
	 */
	public function isTheSameTile(Tile $tile) {
		return $this->isTheSameX($tile) && $this->isTheSameY($tile);
	}

	/**
	 * @return Tile
	 */
	public function getNorthEastTile() {
		return new Tile($this->getX() + 1, $this->getY() - 1);
	}

	/**
	 * @return Tile
	 */
	public function getEastTile() {
		return new Tile($this->getX() + 1, $this->getY());
}

	/**
	 * @return Tile
	 */
	public function getSouthEastTile() {
		return new Tile($this->getX() + 1, $this->getY() + 1);
}

	/**
	 * @return Tile
	 */
	public function getSouthTile() {
		return new Tile($this->getX(), $this->getY() + 1);
	}

	/**
	 * @return Tile
	 */
	public function getSouthWestTile() {
		return new Tile($this->getX() - 1, $this->getY() + 1);
	}

	/**
	 * @return Tile
	 */
	public function getWestTile() {
		return new Tile($this->getX() - 1, $this->getY());
	}

	/**
	 * @return Tile
	 */
	public function getNorthWestTile() {
		return new Tile($this->getX() - 1, $this->getY() - 1);
	}

	/**
	 * @return Tile
	 */
	public function getNorthTile() {
		return new Tile($this->getX(), $this->getY() - 1);
	}
//	/**
//	 * @param Tile $tile
//	 * @return bool
//	 */
//	public function isNorthOf(Tile $tile) {
//		return $this->isTheSameX($tile) && $this->isInRowNorthOf($tile);
//	}
//
//	/**
//	 * @param Tile $tile
//	 * @return bool
//	 */
//	public function isSouthOf(Tile $tile) {
//		return $this->isTheSameX($tile) && $this->isInRowSouthOf($tile);
//	}
//
//	/**
//	 * @param Tile $tile
//	 * @return bool
//	 */
//	public function isEastOf(Tile $tile) {
//		return $this->isTheSameY($tile) && $this->isInColumnEastOf($tile);
//	}
//
//	/**
//	 * @param Tile $tile
//	 * @return bool
//	 */
//	public function isWestOf(Tile $tile) {
//		return $this->isTheSameY($tile) && $this->isInColumnWestOf($tile);
//	}
//
//	/**
//	 * @param Tile $tile
//	 * @return bool
//	 */
//	public function isNorthEastOf(Tile $tile) {
//		return $this->isInRowNorthOf($tile) && $this->isInColumnEastOf($tile);
//	}
//
//	/**
//	 * @param Tile $tile
//	 * @return bool
//	 */
//	public function isNorthWestOf(Tile $tile) {
//		return $this->isInRowNorthOf($tile) && $this->isInColumnWestOf($tile);
//	}
//
//	/**
//	 * @param Tile $tile
//	 * @return bool
//	 */
//	public function isSouthEastOf(Tile $tile) {
//		return $this->isInRowSouthOf($tile) && $this->isInColumnEastOf($tile);
//	}
//
//	/**
//	 * @param Tile $tile
//	 * @return bool
//	 */
//	public function isSouthWestOf(Tile $tile) {
//		return $this->isInRowSouthOf($tile) && $this->isInColumnWestOf($tile);
//	}
//
//	/**
//	 * @param Tile $tile
//	 * @return bool
//	 */
//
//
//	/**
//	 * @param Tile $tile
//	 * @return bool
//	 */
//	public function isNeighborOf(Tile $tile) {
//		// Guard; not necessary but to be completely clear
//		if ($this->isTheSameTile($tile)) {
//			return false;
//		}
//
//		return
//			$this->isNorthOf($tile) || $this->isSouthOf($tile) ||
//			$this->isEastOf($tile) || $this->isWestOf($tile) ||
//			$this->isNorthEastOf($tile) || $this->isNorthWestOf($tile) ||
//			$this->isSouthEastOf($tile) || $this->isSouthWestOf($tile);
//	}
//
//	/**
//	 * @param Tile $tile
//	 * @return bool
//	 */
//	protected function isInRowNorthOf(Tile $tile) {
//		return ($this->getY() - $tile->getY()) == 1;
//	}
//
//	/**
//	 * @param Tile $tile
//	 * @return bool
//	 */
//	protected function isInRowSouthOf(Tile $tile) {
//		return ($this->getY() - $tile->getY()) == -1;
//	}
//
//	/**
//	 * @param Tile $tile
//	 * @return bool
//	 */
//	protected function isInColumnEastOf(Tile $tile) {
//		return ($this->getX() - $tile->getX()) == 1;
//	}
//
//	/**
//	 * @param Tile $tile
//	 * @return bool
//	 */
//	protected function isInColumnWestOf(Tile $tile) {
//		return ($this->getX() - $tile->getX()) == -1;
//	}
}