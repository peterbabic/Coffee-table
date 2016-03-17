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

	/**
	 * Spot constructor.
	 *
	 * @param Tile|Tile[] $tiles
	 */
	public function __construct($tiles = null) {
		if ($tiles instanceof Tile) {
			$this->addTile($tiles);
		}

		if (is_array($tiles)) {
			foreach ($tiles as $tile) {
				$this->addTile($tile);
			}
		}
	}

	/**
	 * @param Tile $tile
	 * @return bool
	 */
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