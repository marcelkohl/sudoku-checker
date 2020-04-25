<?php
namespace App\Domain\Factory;

use App\Domain\Collection\SudokuBlockCollection;
use App\Domain\Factory\SudokuBlockFactoryAbstract;

/**
 * SudokuBlockCollectionFactoryAbstract class handles the methods to be
 * implemented on SudokuBlockColection Factories
 */
abstract class SudokuBlockCollectionFactoryAbstract
{
    /** @var SudokuBlockFactoryAbstract */
    private $sudokuBlockFactory;

    abstract function __construct(SudokuBlockFactoryAbstract $sudokuBlockFactory);
    /**
     * generates the sudoku block collection
     * @param mixed   $values     values to be sed to generate the blockCollection
     * @return SudokuBlockCollection    a sudoku block colelction instance
     */
    abstract function generate($values):SudokuBlockCollection;
}
