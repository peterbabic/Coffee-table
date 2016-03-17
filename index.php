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
//	foreach ($map->getUnVisitedTiles() as $currentTile) {
//		$currentTile->visit();
//
//		if ($currentTile->isRepresentingSpot()) {
//			foreach ($currentTile->getNeighbouringPositions() as $neighbouringPosition) {
//				$neighbouringTile = $map->getTileByPosition($neighbouringPosition);
//				$neighbouringTile->visit();
//			}
//		}
//	}
}
catch (\Exception $e) {
	echo 'Caught exception: ' . $e->getMessage() . "\n";
}
