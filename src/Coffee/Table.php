<?php

namespace Coffee;

/**
 * Class Table
 *
 * @package Coffee
 */
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
	 * @param Map $map
	 */
	public function __construct(Map $map) {
		foreach ($map->getTiles() as $currentTile) {

			if (!$currentTile->isVisited()) {
				$currentTile->visit();

				if ($currentTile->isRepresentingSpot()) {
					$spot = new Spot($currentTile->getPosition());

					foreach ($map->getNeighboursOfTile($currentTile) as $neighbouringTile) {
						$neighbouringTile->visit();

						if ($neighbouringTile->isRepresentingSpot()) {
							$spot->addPosition($neighbouringTile->getPosition());
						}
					}

					$this->addSpot($spot);
				}
			}

		}
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

	/**
	 * @param Spot $spot
	 * @return bool
	 */
	protected function addSpot(Spot $spot) {
		if (is_null($spot)) {
			return false;
		}

		$this->spots[] = $spot;
		return true;
	}

}