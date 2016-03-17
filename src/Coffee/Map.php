<?php

namespace Coffee;

/**
 * Class Map
 *
 * @package Coffee
 */
class Map {

	/**
	 * @var Tile[]
	 */
	private $unVisitedTiles = [];

	/**
	 * @var Tile[]
	 */
	private $visitedTiles = [];
	/**
	 * @var int
	 */
	private $height = 0;
	/**
	 * @var int
	 */
	private $width = 0;

	/**
	 * Map constructor.
	 *
	 * @param $description [][]
	 * @throws \Exception
	 */
	public function __construct($description) {
		// The description must be 2D array containing at least one element
		if (is_null($description) || !is_array($description) || !is_array($description[0]) || count($description[0]) < 1) {
			throw new \Exception('The Coffee Table map could not be loaded.');
		}

		$height = 0;
		$width = 0;

		// This data processing could be written more read-ably in multiple cycles,
		// but at a cost of reduced performance (minor).
		foreach ($description as $rowIndex => $row) {
			foreach ($row as $columnIndex => $tileRepresentation) {
				// All tiles are inherently unvisited at first
				// Also we need to convert indices to positions
				$this->unVisitedTiles[] = new Tile($rowIndex + 1, $columnIndex + 1, $tileRepresentation);

				// Find maximum
				$width = $columnIndex > $width ? $columnIndex : $width;
			}

			// Find maximum
			$height = $rowIndex > $height ? $rowIndex : $height;
		}

		// Convert indices to dimensions
		$this->height = $height + 1;
		$this->width = $width + 1;
	}

	/**
	 * @return Tile[]
	 */
	public function getUnVisitedTiles() {
		return $this->unVisitedTiles;
	}

	/**
	 * @return Tile[]
	 */
	public function getVisitedTiles() {
		return $this->visitedTiles;
	}

	/**
	 * @return array
	 */
	public function describedByArray() {
		$array = [];

		foreach ($this->getUnVisitedTiles() as $tile) {
			$array[$tile->getRowIndex()][$tile->getColumnIndex()] = $tile->containsElement();
		}

		foreach ($this->getVisitedTiles() as $tile) {
			$array[$tile->getRowIndex()][$tile->getColumnIndex()] = $tile->containsElement();
		}

		return $array;
	}

	/**
	 * @param Position $position
	 * @return bool
	 */
	public function visitTile(Position $position) {
		if ($this->isValidPosition($position)) {
			foreach ($this->unVisitedTiles as $unVisitedTileIndex => $unVisitedTile) {
				if ($unVisitedTile->isTheSamePosition($position)) {

					// Move Tile from one group to another and reorder
					$this->visitedTiles[] = $unVisitedTile;
					array_splice($this->unVisitedTiles, $unVisitedTileIndex, 1);

					return true;
				}
			}
		}

		return false;
	}

	/**
	 * @param Position $position
	 * @return bool
	 */
	public function isValidPosition(Position $position) {
		if ($position->getRow() < 0 || $position->getColumn() < 0) {
			return false;
		}

		if ($position->getRow() > $this->getHeight() || $position->getColumn() > $this->getWidth()) {
			return false;
		}

		return true;
	}

	/**
	 * @return int
	 */
	public function getHeight() {
		return $this->height;
	}

	/**
	 * @return int
	 */
	public function getWidth() {
		return $this->width;
	}

	/**
	 * @param $position
	 * @return bool
	 */
	public function isVisitedPosition(Position $position) {
		foreach ($this->visitedTiles as $visitedTile) {
			if ($visitedTile->isTheSamePosition($position)) {
				return true;
			}
		}

		return false;
	}

}