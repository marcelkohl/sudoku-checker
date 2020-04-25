<?php
namespace App\Domain\Exception;

use Exception;

/**
 * Custom exception for values that does not match a flat index for a block
 */
class InvalidBlockFlatIndexException extends Exception
{
}
