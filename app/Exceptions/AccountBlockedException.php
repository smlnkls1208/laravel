<?php

namespace App\Exceptions;

use Exception;

class AccountBlockedException extends Exception
{
    public function render($request)
    {
        return response()->json([
            'message' => 'Ваш аккаунт заблокирован'
        ], 403);
    }
}
