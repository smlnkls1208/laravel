<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\LoginRequest;
use App\Http\Requests\Api\V1\RegisterRequest;
use App\Actions\Auth\RegisterUserAction;
use App\Actions\Auth\LoginUserAction;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterRequest $request, RegisterUserAction $action)
    {
        $result = $action->execute($request->validated());

        return response()->json([
            'message' => 'Регистрация успешна',
            'access_token' => $result['token'],
            'token_type' => 'Bearer',
            'user' => $result['user']->only('id', 'name', 'surname', 'email', 'role'),
        ], 201);
    }

    public function login(LoginRequest $request, LoginUserAction $action)
    {
        $result = $action->execute($request->email, $request->password);

        return response()->json([
            'access_token' => $result['token'],
            'token_type' => 'Bearer',
            'user' => $result['user']->only('id', 'name', 'surname', 'email', 'role'),
        ]);
    }
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Выход выполнен'
        ]);
    }
}





