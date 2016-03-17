<?php

namespace Coffee;

require __DIR__ . '/vendor/autoload.php';

try {
//	$map = new Map([
//		[0, 1, 0, 1],
//		[1, 0, 0, 0],
//		[0, 0, 0, 1],
//		[0, 0, 1, 1]
//	]);
//
//	$table = new Table();
//
//	foreach ($map->getUnVisitedTiles() as $unVisitedTile) {
//		foreach ($unVisitedTile->getNeighbouringPositions() as $neighbouringPosition) {
//			;
//		}
//	}
}
catch (\Exception $e) {
	echo 'Caught exception: ' . $e->getMessage() . "\n";
}
