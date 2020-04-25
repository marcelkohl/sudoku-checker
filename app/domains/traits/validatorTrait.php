<?php

namespace App\Domain\Traits;

/**
 * common validations
 */
trait validatorTrait {
    /**
     * determines if a value is valid (between 0-9)
     * @param  int     $value   the value to be checked
     * @return bool             true if yes, false if not
     */
    function isValidValue(int $value):bool
    {
        return ($value >= 0 && $value <= 9);
    }

    /**
     * determines if an index is valid in a block (between 1-3)
     * @param  int     $index   the value to be checked
     * @return bool             true if yes, false if not
     */
    function isValidBlockIndex(int $index):bool
    {
        return ($index >= 1 && $index <= 3);
    }

    /**
     * determines if an index is valid in a flat block (between 1-9)
     * @param  int     $index   the value to be checked
     * @return bool             true if yes, false if not
     */
    function isValidBlockFlatIndex(int $index):bool
    {
        return ($index >= 1 && $index <= 9);
    }

    /**
     * determines if a string is valid sequence of numbers to be used to
     * build a block (0-9)
     * @param  string   $value  the value to be checked
     * @return bool             true if yes, false if not
     */
    function isValidBlockString(string $value):bool
    {
        return strlen($value) === 9 && is_numeric($value);
    }
}
