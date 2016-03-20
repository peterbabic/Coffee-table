<?php

namespace Coffee;

require __DIR__ . '/vendor/autoload.php';

try {
    $map = [
        [0, 1, 0, 1],
        [1, 0, 0, 0],
        [0, 0, 0, 1],
        [0, 0, 1, 1]
    ];

    $table = new Table($map);

    echo '<table>';
    foreach ($table->getTiles() as $row) {
        echo '<tr>' . "\n";
        /** @var Tile $tile */
        foreach ($row as $tile) {
            echo '<td>' . $tile->getSpotNumber() . '</td>' . "\n";
        }
        echo '</tr>' . "\n";
    }
    echo '</table>';

}
catch (\Exception $e) {
    // TODO: provide more information, like the file:line for example
    echo 'Caught exception: ' . $e->getMessage() . "\n";
}
