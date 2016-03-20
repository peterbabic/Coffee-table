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
     * @var Map
     */
    private $map;

    /**
     * @var Spot
     */
    private $currentSpot = null;

    private $largestSize = 0;

    /**
     * Table constructor.
     *
     * @param Map $map
     */
    public function __construct(Map $map) {
        $this->map = $map;

        $this->recurseMap();
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
     * @return int
     */
    public function getLargestSpotSize() {
        return $this->largestSize;
    }

    public function getSpotIndexByPosition(Position $position) {

    }

    /**
     * @param Tile|null $tile
     */
    protected function recurseMap($tile = null) {
        $tiles = $this->getNextTile($tile);
        foreach ($tiles as $currentTile) {

            if (!$currentTile->isVisited()) {
                $currentTile->visit();

                if ($currentTile->isRepresentingSpot()) {

                    $this->updateCurrentSpot($currentTile->getPosition());

                    // Recursion
                    $this->recurseMap($currentTile);

                    $this->addCurrentSpot();

                }
            }

        }
    }

    /**
     * @param Position $position
     */
    protected function updateCurrentSpot(Position $position) {
        if (is_null($this->currentSpot)) {
            $this->currentSpot = new Spot($position);
        }
        else {
            $this->currentSpot->addPosition($position);
        }
    }

    /**
     * @return bool
     */
    protected function addCurrentSpot() {
        if (is_null($this->currentSpot)) {
            return false;
        }

        $size = $this->currentSpot->getSize();
        // Maximum size
        $this->largestSize = $size > $this->largestSize ? $size : $this->largestSize;

        $this->spots[] = $this->currentSpot;
        $this->currentSpot = null;
        return true;
    }

    /**
     * @param $tile
     * @return Tile[]
     */
    protected function getNextTile($tile = null) {
        if (is_null($tile)) {
            $tiles = $this->map->getTiles();
            return $tiles;
        }
        else {
            $tiles = $this->map->getNeighboursOfTile($tile);
            return $tiles;
        }
    }

}