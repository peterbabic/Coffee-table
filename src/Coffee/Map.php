<?php

namespace Coffee;

/**
 * Class Map
 *
 * @package Coffee
 * TODO: make class Map abstract
 */
class Map {

    /**
     * @var Tile[]
     */
    private $tiles = [];

    /**
     * @var int
     */
    private $height = 0;
    /**
     * @var int
     */
    private $width = 0;

    /**
     * @var array[]
     */
    private $description = [];

    /**
     * Map constructor.
     *
     * @param $description [][]
     * @throws \Exception
     */
    public function __construct($description) {
        // The description must be 2D array containing at least one element
        if (is_null($description) || !is_array($description) || !is_array($description[0]) || count($description[0]) < 1) {
            throw new \Exception('The Coffee Table map could not be loaded.');
        }

        $this->description = $description;

        $width = 0;
        foreach ($description as $rowIndex => $row) {
            foreach ($row as $columnIndex => $tileRepresentation) {
                // Convert indices to positions
                $this->tiles[] = new Tile($rowIndex + 1, $columnIndex + 1, $tileRepresentation);

                // Find longest row
                $width = $columnIndex > $width ? $columnIndex : $width;
            }

        }

        // Convert indices to dimensions
        $this->width = $width + 1;
        $this->height = count($this->getDescription());

    }

    /**
     * @return array
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @return Tile[]
     */
    public function getTiles() {
        return $this->tiles;
    }

    /**
     * @param Tile $position
     * @return Tile|null
     * TODO: this might be ambiguous
     */
    public function getTileByPosition(Tile $position) {
        foreach ($this->getTiles() as $tile) {
            if ($tile->isTheSamePosition($position)) {
                return $tile;
            }
        }

        return null;
    }

    /**
     * @param Tile $tile
     * @return Tile[]
     * TODO: this might be ambiguous
     */
    public function getNeighboursOfTile(Tile $tile) {
        $neighbouringTiles = [];
        foreach ($tile->getNeighbouringPositions() as $neighbouringPosition) {
            $neighbouringTiles[] = $this->getTileByPosition($neighbouringPosition);
        }
        return array_values(array_filter($neighbouringTiles));
    }

    /**
     * @return int
     */
    public function getHeight() {
        return $this->height;
    }

    /**
     * @return int
     */
    public function getWidth() {
        return $this->width;
    }

}