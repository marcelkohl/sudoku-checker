<?php

namespace App\Domain\Traits;

use App\Domain\Exception\InvalidBlockFlatIndexException;

/**
 * common conversions
 */
trait conversionTrait {
    /**
     * converts a block coordinate based on column, row (1-3, 1-3) into a flat index (0-8)
     * @param  int    $colIndex index of the column
     * @param  int    $rowIndex index of the row
     * @return int              the flat index in a block array
     */
    function coordinateToBlockFlatIndex(int $colIndex, int $rowIndex):int
    {
        return ($colIndex - 1) + (($rowIndex - 1) * 3);
    }

    /**
     * converts a flat index (0-8) into a block coordinate based on column, row (1-3, 1-3)
     * @param  int    $flatIndex    flat index (0-8)
     * @return int[]                an array containing the coordinates [col, row]
     */
    function blockFlatIndexToCoordinate(int $flatIndex):array
    {
        $flatIndex = $flatIndex + 1;
        $colIndex = (int) $flatIndex % 3;
        $colIndex = $colIndex === 0 ? 3 : $colIndex;
        $rowIndex = (int) ceil($flatIndex / 3);

        return [$colIndex, $rowIndex];
    }
}
