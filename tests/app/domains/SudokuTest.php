<?php
use App\Domain\Factory\SudokuBlockFromStringFactory;
use App\Domain\Factory\SudokuBlockCollectionFromStringFactory;
use App\Domain\Sudoku;
use App\Domain\SudokuBlock;

use PHPUnit\Framework\TestCase;

class SudokuTest extends TestCase
{
    public function testInstance()
    {
        $sudokuBlockCollectionFromStringFactory = new SudokuBlockCollectionFromStringFactory(
            new SudokuBlockFromStringFactory()
        );

        $blockCollection = $sudokuBlockCollectionFromStringFactory->generate(
            '864325971371849265259761843436198257192657483587432916689713542734528916125694378'
        );

        $sudoku = new Sudoku($blockCollection);

        $this->assertInstanceOf(
            Sudoku::class,
            $sudoku,
            "block from string MUST return a Sudoku Instance"
        );
    }

    public function testGetBlockOnCoordinate()
    {
        $sudokuBlockCollectionFromStringFactory = new SudokuBlockCollectionFromStringFactory(
            new SudokuBlockFromStringFactory()
        );

        $blockCollection = $sudokuBlockCollectionFromStringFactory->generate(
            '864325971371849265259761843436198257192657483587432916689713542734528916125694378'
        );

        $sudoku = new Sudoku($blockCollection);

        $this->assertInstanceOf(
            SudokuBlock::class,
            $sudoku->getBlockOnCoordinate(1,1),
            "block from string MUST return a SudokuBlock Instance"
        );
    }

    public function testGetRow()
    {
        $sudokuBlockCollectionFromStringFactory = new SudokuBlockCollectionFromStringFactory(
            new SudokuBlockFromStringFactory()
        );

        $blockCollection = $sudokuBlockCollectionFromStringFactory->generate(
            '864325971371849265259761843436198257192657483587432916689713542734528916125694378'
        );

        $sudoku = new Sudoku($blockCollection);

        $this->assertEquals($sudoku->getRow(1), [8, 6, 4, 3, 7, 1, 2, 5, 9]);
        $this->assertEquals($sudoku->getRow(9), [5, 4, 2, 9, 1, 6, 3, 7, 8]);
    }

    public function testGetCol()
    {
        $sudokuBlockCollectionFromStringFactory = new SudokuBlockCollectionFromStringFactory(
            new SudokuBlockFromStringFactory()
        );

        $blockCollection = $sudokuBlockCollectionFromStringFactory->generate(
            '864325971371849265259761843436198257192657483587432916689713542734528916125694378'
        );

        $sudoku = new Sudoku($blockCollection);

        $this->assertEquals($sudoku->getCol(1), [8, 3, 9, 4, 1, 2, 6, 7, 5]);
        $this->assertEquals($sudoku->getCol(9), [9, 1, 3, 7, 2, 6, 5, 4, 8]);
    }

    public function testIsSolved()
    {
        $sudokuBlockCollectionFromStringFactory = new SudokuBlockCollectionFromStringFactory(
            new SudokuBlockFromStringFactory()
        );

        $blockCollection = $sudokuBlockCollectionFromStringFactory->generate(
            '864325971371849265259761843436198257192657483587432916689713542734528916125694378'
        );

        $sudoku = new Sudoku($blockCollection);

        $this->assertTrue($sudoku->isSolved(), "solved response MUST be true");
    }
}
?>
