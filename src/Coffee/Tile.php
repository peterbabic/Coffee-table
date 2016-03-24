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
     * Spot that this Tile belongs to
     *
     * @var Spot
     */
    private $spot = null;

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
     * @return Spot
     * @throws \Exception
     */
    public function getSpot() {
        if (is_null($this->spot)) {
            throw new \Exception('This tile does not belong to any spot.');
        }
        
        return $this->spot;
    }

    /**
     * @param Spot $spot
     */
    public function setSpot(Spot $spot) {
        $this->spot = $spot;
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

}