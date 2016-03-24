<?php

namespace Coffee;

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
     * @var Spot[]
     */
    private $largestSpots = [];

    /**
     * @var Stack|null
     */
    private $tileStack = null;

    /**
     * Table constructor.
     *
     * @param $description [][]
     */
    public function __construct($description) {

        parent::__construct($description);

        $this->tileStack = new Stack();
        $this->tileStack->push(array_reverse($this->getTiles()));

        /** @var Tile $tile */
        while (($tile = $this->tileStack->pop()) !== null) {

            // We have finished the spot
            if ($tile->isRepresentingVoid()) {
                $tile->visit();
                $this->finishCurrentSpot();
                continue;
            }

            // We have a Spot representing Tile
            if (!$tile->isVisited()) {
                $tile->visit();
                $this->updateCurrentSpot($tile);

                // Add all the neighbouring, unvisited, Spot representing Tiles
                // of the current one to the Stack, so it is picked in next iteration
                foreach ($this->getNeighboursOfTile($tile) as $neighbourTile) {
                    if (!$neighbourTile->isVisited() && $neighbourTile->isRepresentingSpot()) {
                        $this->tileStack->push($neighbourTile);
                    }
                }
            }

        }

    }

    /**
     * @return Spot[]
     */
    public
    function getSpots() {
        return $this->spots;
    }

    /**
     * @return int
     */
    public
    function getSpotsCount() {
        return count($this->spots);
    }

    /**
     * @return Spot[]
     */
    public
    function getLargestSpots() {
        return $this->largestSpots;
    }

    /**
     * @return Spot
     */
    public function getFirstLargestSpot() {
        if (empty($this->largestSpots)) {
            return null;
        }

        return $this->largestSpots[0];
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

    /**
     *
     */
    private function finishCurrentSpot() {
        // Do the finishing process only on the started Spots
        if (is_null($this->currentSpot)) {
            return;
        }

        $this->updateLargestSpots();
        // The Spots are numbered from 1
        $this->currentSpot->setNumber($this->getSpotsCount() + 1);

        $this->spots[] = $this->currentSpot;
        $this->currentSpot = null;
    }

    /**
     *
     */
    private function updateLargestSpots() {
        if (empty($this->largestSpots)) {
            $this->largestSpots[0] = $this->currentSpot;
        }

        $currentSize = is_null($this->getFirstLargestSpot()) ? 0 : $this->currentSpot->getSize();
        $largestSize = is_null($this->getFirstLargestSpot()) ? 0 : $this->getFirstLargestSpot()->getSize();

        if ($largestSize < $currentSize) {
            // Replace
            $this->largestSpots = [];
            $this->largestSpots[] = $this->currentSpot;
        }
        else if ($largestSize == $currentSize && !in_array($this->currentSpot, $this->largestSpots)) {
            // Append only if not present
            $this->largestSpots[] = $this->currentSpot;
        }
    }

}