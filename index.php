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
    foreach ($table->getDescription() as $rowIndex => $row) {
        echo '<tr>' . "\n";
        foreach ($row as $columnIndex => $column) {
            $position = new Position($rowIndex + 1, $columnIndex + 1);
            echo '<td>' . $table->getSpotNumberByPosition($position) . '</td>' . "\n";
        }
        echo '</tr>' . "\n";
    }
    echo '</table>';

}
catch (\Exception $e) {
    // TODO: provide more information, like the file:line for example
    echo 'Caught exception: ' . $e->getMessage() . "\n";
}
