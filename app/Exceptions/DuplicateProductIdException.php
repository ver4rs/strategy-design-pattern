<?php


namespace App\Exceptions;

use Exception;
use Throwable;

/**
 * Class DuplicateProductIdException
 */
class DuplicateProductIdException extends Exception
{
    /**
     * @param string         $id
     * @param int            $code
     * @param Throwable|null $previous
     */
    public function __construct(?string $id = null, int $code = 0, Throwable $previous = null)
    {
        $message = 'Product ID' . $id . ' already exists.';

        parent::__construct($message, $code, $previous);
    }
}
