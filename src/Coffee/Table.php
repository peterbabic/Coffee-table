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
class Table extends Map {

    /**
     * @var Spot[]
     */
    private $spots = [];

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
     * @param $description [][]
     */
    public function __construct($description) {

        parent::__construct($description);

//        if (is_null($this->currentSpot)) {
//            $tiles = $this->getTiles();
//        }
//        else {
//            $tiles = $this->currentSpot->getQueuedTiles();
//        }
//
//        foreach ($tiles as $rowIndex => $row) {
//            foreach ($row as $columnIndex => $tile) {
//                /** @var Tile $tile */
//                $tile->visit();
//                if ($tile->isRepresentingSpot()) {
//                    foreach ($this->getNeighboursOfTile($tile) as $neighbourIndex => $neighbourTile) {
//                        $neighbourTile->visit();
//
//                        if ($tile->isRepresentingSpot()) {
//
//                        }
//                    }
//                }
//            }
//
//        }

        $this->expandSpotsRecursively();
    }

//    /**
//     * @return Spot[]
//     */
//    public function getSpots() {
//        return $this->spots;
//    }

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

//    /**
//     * @param Tile $searchedPosition
//     * @return int|string
//     */
//    public function getSpotNumberByPosition(Tile $searchedPosition) {
//        // Linear search
//        // TODO: try to find a faster way
//        foreach ($this->getSpots() as $spotIndex => $spot) {
//            foreach ($spot->getTiles() as $position) {
//                if ($searchedPosition->isTheSamePosition($position)) {
//                    return $spotIndex;
//                }
//            }
//        }
//
//        return '';
//    }

    /**
     * @param Tile|null $tile
     */
    protected function expandSpotsRecursively($tile = null) {

        $tiles = $this->getTilePool($tile);
        foreach ($tiles as $currentTile) {

            /** @var Tile $currentTile */
            if (!$currentTile->isVisited()) {
                $currentTile->visit();

                if ($currentTile->isRepresentingSpot()) {

                    $this->updateCurrentSpot($currentTile);

                    // TODO: Replace recursion by iteration
                    $this->expandSpotsRecursively($currentTile);

                    $this->addCurrentSpot();    // (to this table)

                }
            }

        }
    }

    /**
     * @param Tile $tile
     */
    protected function updateCurrentSpot(Tile $tile) {
        if (is_null($this->currentSpot)) {
            $this->currentSpot = new Spot($tile);
        }
        else {
            $this->currentSpot->addTile($tile);
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
    protected function getTilePool($tile = null) {
        if (is_null($tile)) {
            $tiles = $this->getTiles();
            return $tiles;
        }
        else {
            $tiles = $this->getNeighboursOfTile($tile);
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