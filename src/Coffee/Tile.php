<?php

namespace Coffee;

/**
 * Class Tile Represents the Position on the Map with more properties
 *
 * @package Coffee
 */
class Tile extends Position {

    /**
     * Representation on the map, that element exists on the given tile
     */
    const REPRESENTS_SPOT = 1;
    /**
     * Representation on the map, that element does not exist on the given tile
     * Default option
     */
    const REPRESENTS_VOID = 0;
    /**
     * Tiles are inherently unvisited
     */
    const DEFAULT_VISITED_STATE = false;
    /**
     * @var integer
     */

    private $representation;
    /**
     * @var bool
     */
    private $visited = self::DEFAULT_VISITED_STATE;
    /**
     * Zero means that the tile is not in the spot
     * @var int
     */
    private $spotNumber = 0;

    /**
     * Tile constructor.
     *
     * @param      $row
     * @param      $column
     * @param int  $tileRepresentation
     * @param bool $visited
     * @throws \Exception
     */
    public function __construct($row, $column, $tileRepresentation = self::REPRESENTS_VOID, $visited = self::DEFAULT_VISITED_STATE) {
        if (!$this->isRepresentingSpot() && !$this->isRepresentingVoid()) {
            throw new \Exception('The map description contains invalid representations.');
        }

        if (!is_bool($visited)) {
            throw new \Exception('The visited argument must be boolean.');
        }

        parent::__construct($row, $column);

        $this->representation = $tileRepresentation;
        $this->visited = $visited;
    }

    /**
     * @return boolean
     */
    public function isVisited() {
        return $this->visited;
    }

    /**
     * Flags this Tile as "visited"
     */
    public function visit() {
        $this->visited = true;
    }

    /**
     * @return boolean
     */
    public function isRepresentingSpot() {
        return $this->representation == self::REPRESENTS_SPOT;
    }

    /**
     * @return bool
     */
    public function isRepresentingVoid() {
        return $this->representation == self::REPRESENTS_VOID;
    }
//
//    /**
//     * @return Tile
//     */
//    public function getPosition() {
//        return new Tile($this->getRow(), $this->getColumn());
//    }

    /**
     * @return int
     */
    public function getSpotNumber() {
        return $this->spotNumber;
    }

    /**
     * @param int $spotNumber
     */
    public function setSpotNumber($spotNumber) {
        $this->spotNumber = $spotNumber;
    }

}