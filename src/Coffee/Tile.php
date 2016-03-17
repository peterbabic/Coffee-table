<?php

namespace Coffee;

/**
 * Class Tile
 *
 * @package Coffee
 */
class Tile extends Position {

	/**
	 * Representation on the map, that element exists on the given tile
	 */
	const CONTAINS_ELEMENT = 1;
	/**
	 * Representation on the map, that element does not exist on the given tile
	 */
	const NOT_CONTAINS_ELEMENT = 0;
	/**
	 * @var bool
	 */
	private $containsElement = false;

	/**
	 * Tile constructor.
	 *
	 * @param $row
	 * @param $column
	 * @param $mapTileRepresentation
	 * @throws \Exception
	 */
	public function __construct($row, $column, $mapTileRepresentation) {
		if ($mapTileRepresentation != self::CONTAINS_ELEMENT && $mapTileRepresentation != self::NOT_CONTAINS_ELEMENT) {
			throw new \Exception('The map contains invalid representations');
		}

		parent::__construct($row, $column);

		$this->containsElement = $mapTileRepresentation;
	}

	/**
	 * @return boolean
	 */
	public function containsElement() {
		return $this->containsElement == self::CONTAINS_ELEMENT;
	}

}