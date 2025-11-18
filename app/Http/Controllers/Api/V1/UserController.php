<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\UserResource;
use App\Models\User;
use App\Actions\Users\ToggleUserBlockAction;
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

    public function toggleBlock(User $user, ToggleUserBlockAction $action, Request $request)
    {
        $is_blocked = $action->execute($request->user(), $user);

        return response()->json([
            'message' => $is_blocked
                ? 'Пользователь заблокирован'
                : 'Пользователь разблокирован',
            'is_blocked' => $is_blocked,
        ]);
    }
}
