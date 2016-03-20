<?php

namespace Coffee;

    /**
     * Class Position
     *
     * @package Coffee
     */
/**
 * Class Position
 *
 * @package Coffee
 */
class Position {

    /**
     * The lowest possible position for rows and columns
     */
    const LOWER_BOUND = 1;

    /**
     * @var int
     */
    private $column = 0;
    /**
     * @var int
     */
    private $row = 0;

    /**
     * @param $row
     * @param $column
     * @throws \Exception
     */
    function __construct($row, $column) {
        if (!$this->fitsIntoLowerBound($row, $column)) {
            throw new \Exception('The row argument must be higher than ' . self::LOWER_BOUND . '.');
        }

        $this->column = $column;
        $this->row = $row;
    }

    /**
     * @return int
     */
    public function getColumn() {
        return $this->column;
    }

    /**
     * @return int
     */
    public function getColumnIndex() {
        return $this->column - 1;
    }

    /**
     * @return int
     */
    public function getRow() {
        return $this->row;
    }

    /**
     * @return int
     */
    public function getRowIndex() {
        return $this->row - 1;
    }

    /**
     * @param Tile $position
     * @return bool
     */
    public function isTheSameColumn(Tile $position) {
        return $this->getColumn() == $position->getColumn();
    }

    /**
     * @param Tile $position
     * @return bool
     */
    public function isTheSameRow(Tile $position) {
        return $this->getRow() == $position->getRow();
    }

    /**
     * @param Tile $position
     * @return bool
     */
    public function isTheSamePosition(Tile $position) {
        return $this->isTheSameColumn($position) && $this->isTheSameRow($position);
    }

    /**
     * @return Tile
     */
    public function getNorthEastPosition() {
        return $this->getSafeNeighbourPosition($this->getRow() - 1, $this->getColumn() + 1);
    }

    /**
     * @return Tile
     */
    public function getEastPosition() {
        return $this->getSafeNeighbourPosition($this->getRow(), $this->getColumn() + 1);
    }

    /**
     * @return Tile
     */
    public function getSouthEastPosition() {
        return $this->getSafeNeighbourPosition($this->getRow() + 1, $this->getColumn() + 1);
    }

    /**
     * @return Tile
     */
    public function getSouthPosition() {
        return $this->getSafeNeighbourPosition($this->getRow() + 1, $this->getColumn());
    }

    /**
     * @return Tile
     */
    public function getSouthWestPosition() {
        return $this->getSafeNeighbourPosition($this->getRow() + 1, $this->getColumn() - 1);
    }

    /**
     * @return Tile
     */
    public function getWestPosition() {
        return $this->getSafeNeighbourPosition($this->getRow(), $this->getColumn() - 1);
    }

    /**
     * @return Tile
     */
    public function getNorthWestPosition() {
        return $this->getSafeNeighbourPosition($this->getRow() - 1, $this->getColumn() - 1);
    }

    /**
     * @return Tile
     */
    public function getNorthPosition() {
        return $this->getSafeNeighbourPosition($this->getRow() - 1, $this->getColumn());
    }

    /**
     * @return Position[]    Positions of neighbours from NE to N; CW direction
     */
    public function getNeighbouringPositions() {

        // null values from out-of-lower-bound neighbours are filtered out and indices are fixed
        return array_values(array_filter([
            $this->getNorthEastPosition(),
            $this->getEastPosition(),
            $this->getSouthEastPosition(),
            $this->getSouthPosition(),
            $this->getSouthWestPosition(),
            $this->getWestPosition(),
            $this->getNorthWestPosition(),
            $this->getNorthPosition(),
        ]));
    }

    /**
     * @param $row
     * @param $column
     * @return bool
     */
    protected function fitsIntoLowerBound($row, $column) {
        if ($row < self::LOWER_BOUND || $column < self::LOWER_BOUND) {
            return false;
        }

        return true;
    }

    /**
     * @param $row
     * @param $column
     * @return Tile|null
     */
    protected function getSafeNeighbourPosition($row, $column) {
        if ($this->fitsIntoLowerBound($row, $column)) {
            return new Tile($row, $column);
        }

        return null;
    }

}