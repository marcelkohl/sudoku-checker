<?php
namespace App\Domain\Factory;

use App\Domain\Exception\InvalidFlatValueStringException;

use App\Domain\SudokuBlock;
use App\Domain\Traits\validatorTrait;
use App\Domain\Traits\conversionTrait;

/**
 * SudokuBlockFromStringFactory handles to instantiate a sudokublock
 * using a string of numbers as a reference
 */
class SudokuBlockFromStringFactory extends SudokuBlockFactoryAbstract
{
    use conversionTrait, validatorTrait;

    /**
     * generates the sudoku block instance
     * @param string $values    values as string. A sequence of 9 numbers
     * @return SudokuBlock a sudoku block instance
     */
    function generate($values):SudokuBlock
    {
        if (!$this->isValidBlockString($values)) {
            throw new InvalidFlatValueStringException('block string values be a string with 9 numbers');
        } else {
            $flatValues = str_split($values);
            $sudokuBlock = new SudokuBlock();

            foreach ($flatValues as $key => $value) {
                $blockCoordinate = $this->blockFlatIndexToCoordinate($key);
                $sudokuBlock->setValue($blockCoordinate[0], $blockCoordinate[1], $value);
            }

            return $sudokuBlock;
        }
    }
}
