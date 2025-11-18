<?php

namespace App\Actions\Auth;

use App\Exceptions\AuthenticationException;
use App\Exceptions\AccountBlockedException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginUserAction
{
    public function execute(string $email, string $password): array
    {
        $user = User::where('email', $email)->first();

        if (!$user || !Hash::check($password, $user->password)) {
            throw new AuthenticationException();
        }

        if ($user->is_blocked) {
            throw new AccountBlockedException();
        }

        $user->tokens()->delete();

        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'user' => $user,
            'token' => $token,
        ];
    }
}
