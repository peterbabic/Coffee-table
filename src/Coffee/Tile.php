<?php

namespace Coffee;

/**
 * Class Tile
 *
 * @package Coffee
 */
class Tile extends Position {
	/**
	 * @var bool
	 */
	private $containsElement = false;

	/**
	 * Tile constructor.
	 *
	 * @param $row
	 * @param $column
	 * @param $containsElement
	 */
	public function __construct($row, $column, $containsElement) {
		parent::__construct($row, $column);

		$this->containsElement = $containsElement;
	}

	/**
	 * @return boolean
	 */
	public function containsElement() {
		return $this->containsElement;
	}

}