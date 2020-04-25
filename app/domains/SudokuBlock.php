<?php

namespace App\Domain;

use App\Domain\Exception\InvalidValueException;
use App\Domain\Exception\InvalidBlockIndexException;

use App\Domain\Traits\validatorTrait;
use App\Domain\Traits\conversionTrait;

/**
 * SudokuBlock class handles the interaction with an entire block of 3x3 numbers
 */
class SudokuBlock
{
    use validatorTrait, conversionTrait;

    /** @var int[] */
    private $values;

    /**
     * sudoku blocker constructor
     */
    public function __construct()
    {
        $this->clear();
    }

    /**
     * clear the values on the block
     */
    public function clear()
    {
        $this->values = array_fill(0, 9, 0);
    }

    /**
     * return the values set on the block
     * @return int[]
     */
    public function getValues():array
    {
        return $this->values;
    }

    /**
     * set a value on a specific col, row of the block (range of 1-3)
     * @param int $col   the column reference to be set
     * @param int $row   the row reference to be set
     * @param int $value the value to be set
     */
    public function setValue(int $col, int $row, int $value)
    {
        if (!$this->isValidValue($value)) {
            throw new InvalidValueException('Value must be a number between 0 and 9');
        } elseif (!$this->isValidBlockIndex($col) || !$this->isValidBlockIndex($row)) {
            throw new InvalidBlockIndexException('block indexes for row/col must be between 1 and 3');
        } else {
            $flatPosition = $this->coordinateToBlockFlatIndex($col, $row);
            $this->values[$flatPosition] = $value;
        }
    }

    /**
     * get a value from an specific column, row of the block
     * @param  int $col the column reference to be get
     * @param  int $row the row reference to be get
     * @return int      the value
     */
    public function getValue(int $col, int $row):int
    {
        if (!$this->isValidBlockIndex($col) || !$this->isValidBlockIndex($row)) {
            throw new InvalidBlockIndexException('block indexes for row/col must be between 1 and 3');
        } else {
            $flatPosition = $this->coordinateToBlockFlatIndex($col, $row);
            return $this->values[$flatPosition];
        }
    }

    /**
     * check if the values set on the instance are valid
     * (all numbers filled and the numbers does not repeat in the block)
     * @return bool true if is valid, false if not
     */
    public function isValid():bool
    {
        return array_sum($this->getValues()) === 45;
    }
}
