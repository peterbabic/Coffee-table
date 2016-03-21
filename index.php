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

    echo '<table>' . "\n";
    foreach ($table->getStructuredTiles() as $row) {
        echo '<tr>' . "\n";
        /** @var Tile $tile */
        foreach ($row as $tile) {
            $formattedTile = $tile->getSpotNumber() == 0 ? '' : $tile->getSpotNumber();
            echo '<td>' . $formattedTile . '</td>' . "\n";
        }
        echo '</tr>' . "\n";
    }
    echo '</table>' . "\n";

//    echo 'Najväčšia kávová kaluž je s číslom '.$table->getLargestSpot()->ge

}
catch (\Exception $e) {
    // TODO: provide more information, like the file:line for example
    echo 'Caught exception: ' . $e->getMessage() . "\n";
}
