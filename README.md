[![Maintenance](https://img.shields.io/badge/Maintained%3F-no-red.svg)](#)
[![Generic badge](https://img.shields.io/badge/Status-Deprecated-orange.svg)](#)
[![Generic badge](https://img.shields.io/badge/License-BSD_3-blue.svg)](https://opensource.org/license/bsd-3-clause/)
[![Ask Me Anything !](https://img.shields.io/badge/Ask%20me-anything-1abc9c.svg)](https://github.com/marcelkohl)
# Sudoku Checker
Implementation of a sudoku checker by not using any kind of framework, just the PHP language resources.

## Why?
The sudoku checker topic was used to put in practice some resources of the PHP v7 language as classes, collections, exceptions, types, factories, abstracts, traits and interface implementations, and also, TDD practices together with phpunit.

## Implementation
This implementation have two classes that can be used together or alone to solve individual blocks or the entire puzzle.

The input is an string following the pattern:

The solution to be cheked:
```
864 371 259
325 849 761
971 265 843

436 192 587
198 657 432
257 483 916

689 734 125
713 528 694
542 916 378
```

Must be send as parameter like: `864325971371849265259761843436198257192657483587432916689713542734528916125694378`

And, the implementation gives back a boolean telling if the solution is valid (`true`) or not (`false`).
