<?php
/**
 * Created by PhpStorm.
 * User: delmadord
 * Date: 3/16/16
 * Time: 7:56 AM
 */

namespace Coffee;

use Exception;

/**
 * Class Table
 *
 * @package Coffee
 */
class Table {

	/**
	 * @var array
	 */
	private $remainingPositions = [];

	/**
	 * @var int
	 */
	private $height = 0;

	/**
	 * @var int
	 */
	private $width = 0;
	/**
	 * @var Spot[]
	 */
	private $spots = [];

	/**
	 * Table constructor.
	 *
	 * @param $coffeeMap
	 * @throws Exception
	 */
	public function __construct($coffeeMap) {
		if (is_null($coffeeMap) || !is_array($coffeeMap)) {
			throw new Exception('The Coffee Table map could not be loaded.');
		}

		$this->height = $this->calculateMapHeight($coffeeMap);
		$this->width = $this->calculateMapWidth($coffeeMap);
		$this->remainingPositions = $coffeeMap;

//		foreach ($this->remainingPositions as $rowIndex => $tableRow) {
//			foreach ($tableRow as $columnIndex => $containsCoffee) {
//				if ($containsCoffee) {
//					$tile = new Tile($columnIndex, $rowIndex);
//					$spot = new Spot();
//				}
//
//			}
//		}
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
	 * @return array
	 */
	public function getRemainingPositions() {
		return $this->remainingPositions;
	}

	/**
	 * @param $map
	 * @return int
	 */
	private function calculateMapHeight($map) {
		// Count the level 1 array elements
		return count($map);
	}

	/**
	 * @param $map
	 * @return int
	 */
	private function calculateMapWidth($map) {
		$widestRow = 0;
		foreach ($map as $row) {
			// Count the level 2 array elements
			$colWidth = count($row);

			if ($colWidth > $widestRow) {
				$widestRow = $colWidth;
			}
		}
		return $widestRow;
	}

	/**
	 * @param Tile $tile
	 * @return bool
	 */
	public function couldContainTile(Tile $tile) {
		if ($tile->getColumn() < 0 || $tile->getRow() < 0) {
			return false;
		}

		// Dimensions start from 1 but coordinates from 0, need to compensate
		if ($tile->getColumn() > ($this->getWidth() - 1) || $tile->getRow() > ($this->getHeight() - 1)) {
			return false;
		}

		return true;
	}

	/**
	 * @param Spot $spot
	 * @return bool
	 */
	public function addSpot(Spot $spot) {
		if (is_null($spot)) {
			return false;
		}

		$this->spots[] = $spot;
		return true;
	}

	/**
	 * @return Spot[]
	 */
	public function getSpots() {
		return $this->spots;
	}

	/**
	 * @return int
	 */
	public function getSpotsCount() {
		return count($this->spots);
	}
}