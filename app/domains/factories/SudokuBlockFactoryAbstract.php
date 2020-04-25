<?php
namespace App\Domain\Factory;

use App\Domain\SudokuBlock;

/**
 * SudokuBlockFactoryAbstract class handles the methods to be
 * implemented on SudokuBlock Factories
 */
abstract class SudokuBlockFactoryAbstract
{
    /**
     * generates the sudoku block
     * @param mixed $values values to be used on the sudoku block instance
     * @return SudokuBlock a sudoku block instance
     */
    abstract function generate($values):SudokuBlock;
}
