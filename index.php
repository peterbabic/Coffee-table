<?php

namespace Coffee;

require __DIR__ . '/vendor/autoload.php';

try {
	$map = new Map([
		[0, 1, 0, 1],
		[1, 0, 0, 0],
		[0, 0, 0, 1],
		[0, 0, 0, 1]
	]);

	$table = new Table();

	foreach ($map->describedByArray() as $mapRowIndex => $mapRow) {
		foreach ($mapRow as $mapColumnIndex => $containsCoffee) {
			if ($containsCoffee == true) {
				$position = new Position($mapColumnIndex, $mapRowIndex);
				$spot = new Spot($position);
				$table->addSpot($spot);
			}
		}
	}

	var_dump($map->describedByArray());
}
catch (\Exception $e) {
	echo 'Caught exception: ' . $e->getMessage() . "\n";
}
