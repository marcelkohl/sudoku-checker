<?php

namespace App\Domain;

use App\Domain\Collection\SudokuBlockCollection;
use App\Domain\SudokuBlock;

use App\Domain\Traits\conversionTrait;

class Sudoku
{
    use conversionTrait;

    /** @var SudokuBlockCollection */
    private $blockCollection;

    public function __construct(SudokuBlockCollection $sudokuBlockCollection)
    {
        $this->blockCollection = $sudokuBlockCollection;
    }

    /**
     * get the sudoku block on a specific col/row
     * @param  int    $col column index reference
     * @param  int    $row row index reference
     * @return SudokuBlock|null      the sudoku block if found, null if not found
     */
    public function getBlockOnCoordinate(int $col, int $row):?SudokuBlock
    {
        foreach ($this->blockCollection as $blockCollectionItem) {
            if ($blockCollectionItem->getRowIndex() === $row && $blockCollectionItem->getColIndex() === $col) {
                return $blockCollectionItem->getSudokuBlock();
            }
        }

        return null;
    }

    /**
     * get an entire row of a sudoku based on the row index
     * @param  int    $rowIndex sudoku row index to get (1-9)
     * @return int[]  an array containing all the numbers of the entire row
     */
    public function getRow(int $rowIndex):array
    {
        $realIndex = $rowIndex - 1;
        $coordinate = $this->blockFlatIndexToCoordinate($realIndex);
        $sudokuLine = $coordinate[1];
        $blockLineStartPosition = ($coordinate[0] - 1) * 3;
        $lineValues = [];

        for ($sudokuColumnCount = 1; $sudokuColumnCount <= 3 ; $sudokuColumnCount++) {
            $blockValues = $this->getBlockOnCoordinate(
                $sudokuColumnCount,
                $sudokuLine
            )->getValues();

            $blockLineValues = array_slice($blockValues, $blockLineStartPosition, 3);
            $lineValues = array_merge($lineValues, $blockLineValues);
        }

        return $lineValues;
    }

    /**
     * get an entire column of a sudoku based on the column index
     * @param  int    $colIndex sudoku column index to get (1-9)
     * @return int[]  an array containing all the numbers of the entire column
     */
    public function getCol(int $colIndex):array
    {
        $realColIndex = $colIndex - 1;
        $columnValues = [];

        for ($sudokuLineCount = 1; $sudokuLineCount <= 9 ; $sudokuLineCount++) {
            $columnValues[] = $this->getRow($sudokuLineCount)[$realColIndex];
        }

        return $columnValues;
    }

    /**
     * determines if the sudoku is solved
     * @return bool true if solved, false if not
     */
    public function isSolved():bool
    {
        if ($this->blockCollection->length() === 9) {
            foreach ($this->blockCollection as $blockCollectionItem) {
                if ($blockCollectionItem->getSudokuBlock()->isValid() === false) {
                    return false;
                }
            }

            for ($row = 1; $row <= 9; $row++) {
                if (array_sum($this->getRow($row)) !== 45) {
                    return false;
                }
            }

            for ($col = 1; $col <= 9; $col++) {
                if (array_sum($this->getCol($col)) !== 45) {
                    return false;
                }
            }

            return true;
        }

        return false;
    }
}
