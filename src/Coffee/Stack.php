<?php
/**
 * Created by PhpStorm.
 * User: delmadord
 * Date: 3/24/16
 * Time: 11:33 AM
 */

namespace Coffee;

/**
 * Class Stack
 *
 * @package Coffee
 */
class Stack {

    /**
     * @var array
     */
    private $stack = [];

    /**
     * @param $var
     */
    public function push($var) {
        if (is_array($var)) {
            foreach ($var as $item) {
                $this->stack[] = $item;
            }
        }
        else {
            $this->stack[] = $var;
        }
    }

    /**
     * @return mixed
     */
    public function pop() {
        return array_pop($this->stack);
    }
}