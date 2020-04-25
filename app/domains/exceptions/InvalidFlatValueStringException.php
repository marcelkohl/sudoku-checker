<?php
namespace App\Domain\Exception;

use Exception;

/**
 * Custom exception for flat values as string that does not match the pattern
 */
class InvalidFlatValueStringException extends Exception
{
}
