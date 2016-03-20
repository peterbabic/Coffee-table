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
     * @param Tile $tile
     */
    public function __construct(Tile $tile) {
        $this->addTile($tile);
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

    /**
     * @return int
     */
    public function getSize() {
        return count($this->tiles);
    }

    /**
     * @param $number
     */
    public function setNumber($number) {
        foreach ($this->getTiles() as $tile) {
            $tile->setSpotNumber($number);
        }
    }
}