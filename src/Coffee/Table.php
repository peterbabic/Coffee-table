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
	private $remainingTiles = [];

	/**
	 * @var int
	 */
	private $height = 0;

	/**
	 * @var int
	 */
	private $width = 0;

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
		$this->remainingTiles = $coffeeMap;
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
	public function getRemainingTiles() {
		return $this->remainingTiles;
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
	public function isValidForTile(Tile $tile) {
		if ($tile->getX() < 0 || $tile->getY() < 0) {
			return false;
		}

		// Dimensions start from 1 but coordinates from 0, need to compensate
		if ($tile->getX() > ($this->getWidth() - 1) || $tile->getY() > ($this->getHeight() - 1)) {
			return false;
		}

		return true;
	}
}