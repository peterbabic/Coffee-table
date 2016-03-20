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
     * @var Map
     */
    private $map;

    /**
     * @var Spot
     */
    private $currentSpot = null;

    /**
     * @var Spot
     */
    private $largestSpot = null;

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
     * @return Spot
     */
    public function getLargestSpot() {
        return $this->largestSpot;
    }

    /**
     * @param Position $searchedPosition
     * @return int|string
     */
    public function getSpotIndexByPosition(Position $searchedPosition) {
        // Linear search
        // TODO: try to find a faster way
        foreach ($this->getSpots() as $spotIndex => $spot) {
            foreach ($spot->getPositions() as $position) {
                if ($searchedPosition->isTheSamePosition($position)) {
                    return $spotIndex;
                }
            }
        }

        return '';
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

                    $this->addCurrentSpot();    // (to this table)

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

        $this->updateLargestSpot();

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

    /**
     * Just a wrapper to have it neat and clean
     */
    protected function updateLargestSpot() {
        if (is_null($this->largestSpot)) {
            $this->largestSpot = $this->currentSpot;
        }

        $currentSize = is_null($this->largestSpot) ? 0 : $this->currentSpot->getSize();
        $largestSize = is_null($this->largestSpot) ? 0 : $this->largestSpot->getSize();
        // Maximum size
        $this->largestSpot = $currentSize > $largestSize ? $this->currentSpot : $this->largestSpot;
    }

}