<?php

namespace Coffee;

/**
 * Class Tile
 *
 * @package Coffee
 */
/**
 * Class Tile
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
	private $containsElement = false;

	/**
	 * Tile constructor.
	 *
	 * @param $row
	 * @param $column
	 * @param $tileRepresentation
	 * @throws \Exception
	 */
	public function __construct($row, $column, $tileRepresentation) {
		if ($tileRepresentation != self::REPRESENTS_ELEMENT && $tileRepresentation != self::REPRESENTS_VOID) {
			throw new \Exception('The map contains invalid representations');
		}

		parent::__construct($row, $column);

		$this->containsElement = $tileRepresentation;
	}

	/**
	 * @return boolean
	 */
	public function representsElement() {
		return $this->containsElement == self::REPRESENTS_ELEMENT;
	}

	/**
	 * @return Position
	 */
	public function getPosition() {
		return new Position($this->getRow(), $this->getColumn());
	}

}