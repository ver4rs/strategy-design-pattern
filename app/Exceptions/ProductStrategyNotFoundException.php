<?php

namespace App\Exceptions;

use Exception;
use Throwable;

/**
 * Class ProductStrategyNotFoundException
 */
class ProductStrategyNotFoundException extends Exception
{
    /**
     * @param string         $message
     * @param int            $code
     * @param Throwable|null $previous
     */
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        $message = 'Product Strategy could not be found.';

        parent::__construct($message, $code, $previous);
    }
}
