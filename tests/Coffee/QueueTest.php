<?php

namespace Coffee;

// This is not necessary, since it is bootstrapped but serves for debugging purposes
require __DIR__ . '/../../vendor/autoload.php';

class QueueTest extends \PHPUnit_Framework_TestCase {

    public function testPushPop() {
        $queue = new Queue();
        $queue->push('1');
        $queue->push('2');
        $queue->push('3');

        $this->assertEquals('1', $queue->pop());
    }
}
