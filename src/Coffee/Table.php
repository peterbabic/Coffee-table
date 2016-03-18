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
     * Table constructor.
     *
     * @param Map $map
     */
    public function __construct(Map $map) {
        $this->map = $map;

        $this->recur();
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
     * @param Tile|null $tile
     */
    protected function recur($tile = null) {
        $tiles = $this->getNextTile($tile);
        foreach ($tiles as $currentTile) {

            if (!$currentTile->isVisited()) {
                $currentTile->visit();

                if ($currentTile->isRepresentingSpot()) {

                    $this->updateCurrentSpot($currentTile->getPosition());

                    // Recursion?
//                    $tiles = $this->getNextTile($currentTile);
//                    foreach ($tiles as $neighbouringTile) {
//
//                        if (!$neighbouringTile->isVisited()) {
//                            $neighbouringTile->visit();
//
//                            if ($neighbouringTile->isRepresentingSpot()) {
//                                $this->updateCurrentSpot($neighbouringTile->getPosition());
//                            }
//
//                        }
//                    }
                    $this->recur($currentTile);

                    $this->addCurrentSpot();

                }
            }

        }
    }

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

        $this->spots[] = $this->currentSpot;
        $this->currentSpot = null;
        return true;
    }

    /**
     * @param $tile
     * @return Tile[]
     */
    private function getNextTile($tile = null) {
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