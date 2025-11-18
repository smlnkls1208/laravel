<?php

namespace App\Exceptions;

use Exception;

class AuthenticationException extends Exception
{
    public function render($request)
    {
        return response()->json([
            'message' => 'Неверные учётные данные'
        ], 401);
    }
}
