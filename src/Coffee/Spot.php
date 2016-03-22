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
     * @var int
     */
    private $number;

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

        $tile->setSpot($this);
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
     * @return int
     */
    public function getNumber() {
        return $this->number;
    }

    /**
     * @param int $number
     */
    public function setNumber($number) {
        $this->number = $number;
    }
}