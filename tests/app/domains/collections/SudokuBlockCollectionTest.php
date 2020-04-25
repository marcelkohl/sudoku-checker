<?php

use App\Domain\Collection\SudokuBlockCollection;
use App\Domain\Collection\SudokuBlockCollectionItem;
use App\Domain\Exception\InvalidBlockIndexException;

use App\Domain\Factory\SudokuBlockFromStringFactory;

use App\Domain\SudokuBlock;
use PHPUnit\Framework\TestCase;

class SudokuBlockCollectionTest extends TestCase
{
    public function testAdd()
    {
        $sudokuBlockCollection = new SudokuBlockCollection();
        $sudokuBlock = (new SudokuBlockFromStringFactory())->generate("123456789");

        $sudokuBlockCollection->add(new SudokuBlockCollectionItem(1, 1, $sudokuBlock));
        $this->assertCount(1, $sudokuBlockCollection);
    }

    public function testAddInvalid()
    {
        $this->expectException(InvalidBlockIndexException::class);

        $sudokuBlockCollection = new SudokuBlockCollection();
        $sudokuBlock = (new SudokuBlockFromStringFactory())->generate("123456789");

        $sudokuBlockCollection->add(new SudokuBlockCollectionItem(1, 12, $sudokuBlock));
    }
}
