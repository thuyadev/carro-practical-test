<?php

namespace App\Exceptions;

use Exception;

class CustomException extends Exception
{
    public function __construct(string $message = "SERVER ERROR", int|string $code = 500)
    {
        parent::__construct($message, $code);
    }
}
