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

        $this->expandSpotsRecursively();
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
     * @param Tile|null $tile
     */
    protected function expandSpotsRecursively($tile = null) {

        // Either get Tiles from Map if root or from neighbours if called recursively with argument
        foreach ($this->getTilePool($tile) as $currentTile) {

            /** @var Tile $currentTile */
            if (!$currentTile->isVisited()) {
                $currentTile->visit();

                if ($currentTile->isRepresentingSpot()) {

                    // Either form a new Spot or add current Tile to the existing one
                    $this->updateCurrentSpot($currentTile);

                    // TODO: Replace recursion by iteration
                    $this->expandSpotsRecursively($currentTile);

                    // No other neighbouring tiles were found
                    $this->finishCurrentSpot();

                }
            }

        }
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
     * @param Tile $tile
     */
    private function updateCurrentSpot(Tile $tile) {
        if (is_null($this->currentSpot)) {
            $this->currentSpot = new Spot($tile);
        }
        else {
            $this->currentSpot->addTile($tile);
        }
    }

    private function finishCurrentSpot() {
        // Do the finishing process only on the started Spots
        if (is_null($this->currentSpot)) {
            return;
        }

        $this->updateLargestSpot();
        // The Spots are numbered from 1
        $this->currentSpot->setNumber($this->getSpotsCount() + 1);

        $this->spots[] = $this->currentSpot;
        $this->currentSpot = null;
    }

    private function updateLargestSpot() {
        if (is_null($this->largestSpot)) {
            $this->largestSpot = $this->currentSpot;
        }

        $currentSize = is_null($this->largestSpot) ? 0 : $this->currentSpot->getSize();
        $largestSize = is_null($this->largestSpot) ? 0 : $this->largestSpot->getSize();
        // Maximum size
        $this->largestSpot = $currentSize > $largestSize ? $this->currentSpot : $this->largestSpot;
    }

}