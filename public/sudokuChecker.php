<?php
require __DIR__ . '/../vendor/autoload.php';

use App\Domain\Factory\SudokuBlockFromStringFactory;
use App\Domain\Factory\SudokuBlockCollectionFromStringFactory;
use App\Domain\Sudoku;

$sudokuBlockCollectionFromStringFactory = new SudokuBlockCollectionFromStringFactory(
    new SudokuBlockFromStringFactory()
);

$blockCollection = $sudokuBlockCollectionFromStringFactory->generate(
    '864325971371849265259761843436198257192657483587432916689713542734528916125694378'
);

$sudoku = new Sudoku($blockCollection);

echo $sudoku->isSolved() ? "Solved" : "Not Solved";
