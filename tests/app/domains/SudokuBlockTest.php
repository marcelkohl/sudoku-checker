<?php
use App\Domain\Exception\InvalidValueException;
use App\Domain\Exception\InvalidBlockIndexException;

use App\Domain\SudokuBlock;

use PHPUnit\Framework\TestCase;

class SudokuBlockTest extends TestCase
{
    public function testClear()
    {
        $sudokuBlock = new SudokuBlock();
        $sudokuBlock->setValue(1, 1, 2);
        $sudokuBlock->clear();

        $this->assertEquals(
            0,
            array_sum($sudokuBlock->getValues()),
            "all values in the block MUST be zero after clean"
        );
    }

    public function testInvalidSet()
    {
        $this->expectException(InvalidValueException::class);

        $sudokuBlock = new SudokuBlock();
        $sudokuBlock->setValue(1, 1, 10);
    }

    public function testInvalidBlockIndex()
    {
        $this->expectException(InvalidBlockIndexException::class);

        $sudokuBlock = new SudokuBlock();
        $sudokuBlock->setValue(0, 0, 2);
    }

    public function testSetAndGet()
    {
        $sudokuBlock = new SudokuBlock();
        $valueReference = 9;
        $colReference = 1;
        $rowReference = 3;

        $sudokuBlock->setValue($colReference, $rowReference, $valueReference);

        $this->assertEquals(
            $valueReference,
            $sudokuBlock->getValue($colReference, $rowReference),
            "value get after set MUST be the same"
        );
    }

    public function testIsValidFalse()
    {
        $sudokuBlock = new SudokuBlock();

        $this->assertFalse(
            $sudokuBlock->isValid(),
            "an empty instance MUST be invalid"
        );

        $sudokuBlock->setValue(1, 2, 9);
        $this->assertFalse(
            $sudokuBlock->isValid(),
            "a not fullfilled instance MUST be invalid"
        );
    }
}
?>
