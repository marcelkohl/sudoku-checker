<?php
namespace App\Domain\Exception;

use Exception;

/**
 * Custom exception for values that does not match the validation of a valid value
 */
class InvalidValueException extends Exception
{
}
