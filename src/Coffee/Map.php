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
     * @var Tile[] $tiles
     */
    private $tiles = [];
    /**
     * @var Tile[][]
     */
    private $structuredTiles = [];
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
                $tile = new Tile($rowIndex + 1, $columnIndex + 1, $tileRepresentation);

                $this->tiles[] = $tile;
                $this->structuredTiles[$rowIndex][$columnIndex] = $tile;

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
     * TODO: this is probably not used anywhere
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
     * @return Tile[][]
     */
    public function getStructuredTiles() {
        return $this->structuredTiles;
    }

    /**
     * @param Position $position
     * @return Tile|null
     */
    public function getTileByPosition(Position $position) {
        if (isset($this->structuredTiles[$position->getRowIndex()][$position->getColumnIndex()])) {
            return $this->structuredTiles[$position->getRowIndex()][$position->getColumnIndex()];
        }

        return null;
    }

    /**
     * @param Tile $tile
     * @return Tile[]
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