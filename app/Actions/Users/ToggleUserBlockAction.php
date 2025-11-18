<?php

namespace App\Actions\Users;

use App\Exceptions\SelfActionForbiddenException;
use App\Models\User;

class ToggleUserBlockAction
{
    public function execute(User $actor, User $target): bool
    {
        if ($actor->id === $target->id) {
            throw new SelfActionForbiddenException();
        }

        $target->is_blocked = !$target->is_blocked;
        $target->save();

        return $target->is_blocked;
    }
}
