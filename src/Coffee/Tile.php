<?php

namespace Coffee;

/**
 * Class Tile Represents the Position on the Map with more properties
 *
 * @package Coffee
 */
class Tile extends Position {

	/**
	 * Representation on the map, that element exists on the given tile
	 */
	const REPRESENTS_ELEMENT = 1;
	/**
	 * Representation on the map, that element does not exist on the given tile
	 */
	const REPRESENTS_VOID = 0;
	/**
	 * @var bool
	 */
	private $representsElement = false;

//	private $isVisited = false;

	/**
	 * Tile constructor.
	 *
	 * @param $row
	 * @param $column
	 * @param $tileRepresentation
	 * @throws \Exception
	 */
	public function __construct($row, $column, $tileRepresentation) {
		if (!$this->representsElement() && !$this->representsVoid()) {
			throw new \Exception('The map contains invalid representations');
		}

		parent::__construct($row, $column);

		$this->representsElement = $tileRepresentation;
	}

	/**
	 * @return boolean
	 */
	public function representsElement() {
		return $this->representsElement == self::REPRESENTS_ELEMENT;
	}

	public function representsVoid() {
		return $this->representsElement == self::REPRESENTS_VOID;
	}

	/**
	 * @return Position
	 */
	public function getPosition() {
		return new Position($this->getRow(), $this->getColumn());
	}

}