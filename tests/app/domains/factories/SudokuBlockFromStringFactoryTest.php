<?php

use App\Domain\SudokuBlock;
use App\Domain\Factory\SudokuBlockFromStringFactory;
use PHPUnit\Framework\TestCase;

class SudokuBlockFromStringFactoryTest extends TestCase
{
    public function testGenerate()
    {
        $sudokuBlockFromStringFactory = new SudokuBlockFromStringFactory();
        $sudokuBlock = $sudokuBlockFromStringFactory->generate("864371259");

        $this->assertInstanceOf(
            SudokuBlock::class,
            $sudokuBlock,
            "block from string MUST return a SudokuBlock Instance"
        );
    }

    public function testInstanceValues()
    {
        $sudokuBlockFromStringFactory = new SudokuBlockFromStringFactory();
        $sudokuBlock = $sudokuBlockFromStringFactory->generate("123456789");

        $this->assertTrue(
            $sudokuBlock->isValid(),
            "block instance generated from a string MUST be valid"
        );
    }
}
