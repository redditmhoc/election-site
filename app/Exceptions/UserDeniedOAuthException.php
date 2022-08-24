<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;

class UserDeniedOAuthException extends Exception
{
    public function report()
    {
        if ($this->getMessage() != 'access_denied') {
            Log::error("{$this->getMessage()} {$this->getFile()} Line {$this->getLine()}");
        }
    }

    public function render()
    {
        return false;
    }
}
