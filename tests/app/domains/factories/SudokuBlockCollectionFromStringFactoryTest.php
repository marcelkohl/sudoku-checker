<?php

use App\Domain\Factory\SudokuBlockCollectionFromStringFactory;

use App\Domain\SudokuBlock;
use App\Domain\Factory\SudokuBlockFromStringFactory;
use PHPUnit\Framework\TestCase;

class SudokuBlockCollectionFromStringFactoryTest extends TestCase
{
    public function testGenerate()
    {
        $sudokuBlockCollectionFromStringFactory = new SudokuBlockCollectionFromStringFactory(
            new SudokuBlockFromStringFactory()
        );

        $blockCollection = $sudokuBlockCollectionFromStringFactory->generate(
            '864371259325849761971265843436192587198657432257483916689734125713528694542916378'
        );

        $this->assertCount(9, $blockCollection);
    }
}
