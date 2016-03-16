<?php
/**
 * Created by PhpStorm.
 * User: delmadord
 * Date: 3/16/16
 * Time: 6:21 PM
 */

namespace Coffee;

use Exception;

/**
 * Class Map
 *
 * @package Coffee
 */
class Map {
	/**
	 * @var array
	 */
	private $description = [];

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
	 * @param $description
	 * @throws Exception
	 */
	public function __construct($description) {
		if (is_null($description) || !is_array($description)) {
			throw new Exception('The Coffee Table map could not be loaded.');
		}

		$this->width = $this->calculateMapWidth($description);
		$this->height = $this->calculateMapHeight($description);

		$this->description = $description;
	}

	/**
	 * @return array
	 */
	public function describedByArray() {
		return $this->description;
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
	 * @param $description
	 * @return int
	 */
	private function calculateMapHeight($description) {
		// Count the level 1 array elements
		return count($description);
	}

	/**
	 * @param $description
	 * @return int
	 */
	private function calculateMapWidth($description) {
		$widestRow = 0;
		foreach ($description as $row) {
			// Count the level 2 array elements
			$colWidth = count($row);

			if ($colWidth > $widestRow) {
				$widestRow = $colWidth;
			}
		}
		return $widestRow;
	}

//	/**
//	 * @param Tile $tile
//	 * @return bool
//	 */
//	public function couldContainTile(Tile $tile) {
//		if ($tile->getColumn() < 0 || $tile->getRow() < 0) {
//			return false;
//		}
//
//		// Dimensions start from 1 but coordinates from 0, need to compensate
//		if ($tile->getColumn() > ($this->getWidth() - 1) || $tile->getRow() > ($this->getHeight() - 1)) {
//			return false;
//		}
//
//		return true;
//	}

}