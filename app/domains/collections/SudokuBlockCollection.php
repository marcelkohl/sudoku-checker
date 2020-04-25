<?php
namespace App\Domain\Collection;

use App\Domain\Collection\SudokuBlockCollectionItem;

class SudokuBlockCollection extends BaseCollection
{
    /**
     * adds an item into the collection
     *
     * @param SudokuBlockCollectionItem   $sudokuBlockCollectionItem    object to be added to the collection
     * @param mixed                       $key            optional key as index
     */
    public function add($sudokuBlockCollectionItem, $key = null)
    {
        if ($sudokuBlockCollectionItem instanceof SudokuBlockCollectionItem) {
            parent::add($sudokuBlockCollectionItem, $key);
        }
    }
}
