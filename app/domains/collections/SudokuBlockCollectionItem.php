<?php
namespace App\Domain\Collection;

use App\Domain\Exception\InvalidBlockIndexException;

use App\Domain\SudokuBlock;
use App\Domain\Traits\validatorTrait;

/**
 * an item fom a SudokuBlockCollection
 */
class SudokuBlockCollectionItem
{
    use validatorTrait;

    /** @var int */
    private $colIndex;
    /** @var int */
    private $rowIndex;
    /** @var SudokuBlock */
    private $sudokuBlock;

    /**
     * constructor
     * @param int         $colIndex     column index where the block will be set
     * @param int         $rowIndex     row index where the block will be set
     * @param SudokuBlock $sudokuBlock  the block instance to be set
     */
    public function __construct(int $colIndex, int $rowIndex, SudokuBlock $sudokuBlock)
    {
        if (!$this->isValidBlockIndex($colIndex) || !$this->isValidBlockIndex($rowIndex)) {
            throw new InvalidBlockIndexException('block indexes for row/col must be between 1 and 3');
        } else {
            $this->colIndex = $colIndex;
            $this->rowIndex = $rowIndex;
            $this->sudokuBlock = $sudokuBlock;
        }
    }

    /**
     * get the column index set on the instance
     * @return int
     */
    public function getColIndex():int
    {
        return $this->colIndex;
    }

    /**
     * get the row index set on the instance
     * @return int
     */
    public function getRowIndex():int
    {
        return $this->rowIndex;
    }

    /**
     * get the object set on the instance
     * @return SudokuBlock
     */
    public function getSudokuBlock():SudokuBlock
    {
        return $this->sudokuBlock;
    }
}
