<?php

namespace App\Exceptions;

use Exception;

class BookUnavailableException extends Exception
{
    public function render($request)
    {
        return response()->json([
            'message' => 'Книга недоступна для аренды'
        ], 400);
    }
}
