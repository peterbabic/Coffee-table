<?php

namespace Coffee;

/**
 * Class Queue
 *
 * @package Coffee
 */
class Queue {

    /**
     * @var array
     */
    private $queue = [];

    /**
     * @param $element
     */
    public function push($element) {
        $this->queue[] = $element;
    }

    /**
     * @return mixed
     */
    public function pop() {
        return array_shift($this->queue);
    }
}