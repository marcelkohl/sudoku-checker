<?php
namespace App\Domain\Factory;

use App\Domain\Collection\SudokuBlockCollection;
use App\Domain\Collection\SudokuBlockCollectionItem;
use App\Domain\Traits\validatorTrait;
use App\Domain\Traits\conversionTrait;

/**
 * SudokuBlockCollectionFromStringFactory handles to instantiate a sudokublock
 * collection using a string of numbers as a reference
 */
class SudokuBlockCollectionFromStringFactory extends SudokuBlockCollectionFactoryAbstract
{
    use conversionTrait, validatorTrait;

    /** @var SudokuBlockFactoryAbstract */
    private $sudokuBlockFactory;

    public function __construct(SudokuBlockFactoryAbstract $sudokuBlockFactory)
    {
        $this->sudokuBlockFactory = $sudokuBlockFactory;
    }

    /**
     * generates the sudoku block collection
     * @param string $values    a string containing a sequence of numbers to be on the collection.
     * @return SudokuBlockCollection a sudoku block colelction instance
     */
    function generate($values):SudokuBlockCollection
    {
        $flatValues = str_split($values, 9);
        $sudokuBlockCollection = new SudokuBlockCollection();

        foreach ($flatValues as $key => $value) {
            $blockCoordinate = $this->blockFlatIndexToCoordinate($key);

            $sudokuBlockCollection->add(new SudokuBlockCollectionItem(
                $blockCoordinate[0],
                $blockCoordinate[1],
                $this->sudokuBlockFactory->generate($value)
            ));
        }

        return $sudokuBlockCollection;
    }
}
