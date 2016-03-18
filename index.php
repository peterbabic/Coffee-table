<?php

namespace Coffee;

require __DIR__ . '/vendor/autoload.php';

try {
    $description = [
        [0, 1, 0, 1],
        [1, 0, 0, 0],
        [0, 0, 0, 1],
        [0, 0, 1, 1]
    ];

    $map = new Map($description);

    $table = new Table($map);

    var_dump($table->getSpots());

}
catch (\Exception $e) {
    echo 'Caught exception: ' . $e->getMessage() . "\n";
}
