<?php

namespace Coffee;

    /**
     * Class Map
     *
     * @package Coffee
     */
/**
 * Class Map
 *
 * @package Coffee
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

        $height = 0;
        $width = 0;

        // This data processing could be written more read-ably in multiple cycles / private methods,
        // but at a cost of reduced performance (minor).
        foreach ($description as $rowIndex => $row) {
            foreach ($row as $columnIndex => $tileRepresentation) {
                // W need to convert indices to positions
                $this->tiles[] = new Tile($rowIndex + 1, $columnIndex + 1, $tileRepresentation);

                // Find maximum
                $width = $columnIndex > $width ? $columnIndex : $width;
            }

            // Find maximum
            $height = $rowIndex > $height ? $rowIndex : $height;
        }

        // Convert indices to dimensions
        $this->height = $height + 1;
        $this->width = $width + 1;
    }

    /**
     * @return Tile[]
     */
    public function getTiles() {
        return $this->tiles;
    }

    /**
     * @return Tile[]
     */
    public function getUnvisitedTiles() {
        $array = [];
        foreach ($this->getTiles() as $tile) {
            if (!$tile->isVisited()) {
                $array[] = $tile;
            }
        }
        return $array;
    }

    public function getUnvisitedTile() {
        foreach ($this->getTiles() as $tile) {
            if (!$tile->isVisited()) {
                return $tile;
            }
        }

        return false;
    }

    /**
     * @param Position $position
     * @return Tile|null
     */
    public function getTileByPosition(Position $position) {
        foreach ($this->getTiles() as $tile) {
            if ($tile->isTheSamePosition($position)) {
                return $tile;
            }
        }

        return null;
    }

    /**
     * @return array
     */
    public function describedByArray() {
        $array = [];

        foreach ($this->getTiles() as $tile) {
            $array[$tile->getRowIndex()][$tile->getColumnIndex()] = $tile->isRepresentingSpot();
        }

        return $array;
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
//
//	/**
//	 * @param Position $position
//	 * @return bool
//	 */
//	public function visitPosition(Position $position) {
//		if ($this->hasValidPosition($position)) {
//			foreach ($this->tiles as $unVisitedTileIndex => $unVisitedTile) {
//				if ($unVisitedTile->isTheSamePosition($position)) {
//
//					// Move Tile from one group to another and reorder
//					$this->visitedTiles[] = $unVisitedTile;
//					array_splice($this->tiles, $unVisitedTileIndex, 1);
//
//					return true;
//				}
//			}
//		}
//
//		return false;
//	}
//
//	/**
//	 * Test the upper bound
//	 *
//	 * @param Position $position
//	 * @return bool
//	 */
//	public function hasValidPosition(Position $position) {
//		if ($position->getRow() > $this->getHeight() || $position->getColumn() > $this->getWidth()) {
//			return false;
//		}
//
//		return true;
//	}
//
//	/**
//	 * @param $position
//	 * @return bool
//	 */
//	public function isVisitedPosition(Position $position) {
//		foreach ($this->visitedTiles as $visitedTile) {
//			if ($visitedTile->isTheSamePosition($position)) {
//				return true;
//			}
//		}
//
//		return false;
//	}

}