<?php
/**
 * Created by PhpStorm.
 * User: delmadord
 * Date: 3/16/16
 * Time: 7:56 AM
 */

namespace Coffee;

/**
 * Class Table
 *
 * @package Coffee
 */
class Table {


	/**
	 * @var Spot[]
	 */
	private $spots = [];

	/**
	 * Table constructor.
	 */
	public function __construct() {

//		foreach ($this->remainingPositions as $rowIndex => $tableRow) {
//			foreach ($tableRow as $columnIndex => $containsCoffee) {
//				$this->processPosition($columnIndex, $rowIndex, $containsCoffee);
//			}
//		}
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

//	/**
//	 * @param int  $column
//	 * @param int  $row
//	 * @param bool $positionContainsCoffee
//	 */
//	public function processCoordinate($column, $row, $positionContainsCoffee) {
//		if ($positionContainsCoffee) {
//			$tile = new Tile($column, $row);
//			if ($this->getSpotsCount() == 0) {
//				$spot = new Spot();
//				$spot->addTile($tile);
//			}
//			else {
//			}
//		}
//	}

}