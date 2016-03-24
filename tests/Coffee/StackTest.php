<?php

namespace Coffee;

// This is not necessary, since it is bootstrapped but serves for debugging purposes
require __DIR__ . '/../../vendor/autoload.php';

class StackTest extends \PHPUnit_Framework_TestCase {

    public function testSinglePushPop() {
        $stack = new Stack();
        $stack->push('1');
        $stack->push('2');
        $stack->push('3');

        $this->assertEquals('3', $stack->pop());
    }

    public function testArrayPushPop() {
        $stack = new Stack();
        $stack->push(['1', '2']);
        $stack->push('3');
        $stack->push(['4', '5', '6']);

        $this->assertEquals('6', $stack->pop());
    }
}
