<?php
/**
 * Created by PhpStorm.
 * User: delmadord
 * Date: 3/16/16
 * Time: 2:42 PM
 */

namespace Coffee;

/**
 * Class Spot
 *
 * @package Coffee
 */
class Spot {

	/**
	 * @var Tile[]
	 */
	private $tiles = [];

	public function addTile(Tile $tile) {
		if (is_null($tile)) {
			return false;
		}

		$this->tiles[] = $tile;
		return true;
	}

	/**
	 * @return Tile[]
	 */
	public function getTiles() {
		return $this->tiles;
	}

}