<?php
/**
 * Created by PhpStorm.
 * User: delmadord
 * Date: 3/16/16
 * Time: 2:42 PM
 */

namespace Coffee;

class SpotTest extends \PHPUnit_Framework_TestCase {

	public function testGetTiles() {
		$tile = new Tile(1, 2);
		$spot = new Spot();
		$spot->addTile($tile);

		$this->assertEquals([$tile], $spot->getTiles());
	}
}
