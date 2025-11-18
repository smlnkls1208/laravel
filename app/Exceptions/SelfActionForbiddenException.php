<?php

namespace App\Exceptions;

use Exception;

class SelfActionForbiddenException extends Exception
{
    public function render($request)
    {
        return response()->json([
            'message' => 'Нельзя применять это действие к себе'
        ], 403);
    }
}
