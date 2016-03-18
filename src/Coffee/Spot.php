<?php
/**
 * Created by PhpStorm.
 * User: delmadord
 * Date: 3/16/16
 * Time: 2:42 PM
 */

namespace Coffee;

    /**
     * Class Spot
     *
     * @package Coffee
     */
/**
 * Class Spot
 *
 * @package Coffee
 */
class Spot {

    /**
     * @var Position[]
     */
    private $positions = [];

    /**
     * Spot constructor.
     *
     * @param Position $position
     */
    public function __construct(Position $position) {
        $this->positions[] = $position;
    }

    /**
     * @param Position $position
     * @return bool
     */
    public function addPosition(Position $position) {
        if (is_null($position)) {
            return false;
        }

        $this->positions[] = $position;
        return true;
    }

    /**
     * @return Position[]
     */
    public function getPositions() {
        return $this->positions;
    }

}