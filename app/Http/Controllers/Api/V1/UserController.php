<?php

namespace App\Http\Controllers\Api\V1;
use Illuminate\Routing\Controller;

use App\Http\Resources\Api\V1\UserResource;
use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function initialize(): void
    {
        $this->authorizeResource(User::class, 'user');
    }

    public function index()
    {
        $users = User::all();
        return UserResource::collection($users);
    }

    public function toggleBlock(User $user)
    {
        $user->is_blocked = !$user->is_blocked;
        $user->save();

        return response()->json([
            'message' => $user->is_blocked ? 'Пользователь заблокирован' : 'Пользователь разблокирован',
            'is_blocked' => $user->is_blocked,
        ]);
    }
}
