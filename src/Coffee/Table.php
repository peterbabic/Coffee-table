<?php

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
	 *
	 * @param Spot|Spot[] $spots
	 */
	public function __construct($spots = null) {
		if ($spots instanceof Spot) {
			$this->addSpot($spots);
		}

		if (is_array($spots)) {
			foreach ($spots as $spot) {
				$this->addSpot($spot);
			}
		}

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