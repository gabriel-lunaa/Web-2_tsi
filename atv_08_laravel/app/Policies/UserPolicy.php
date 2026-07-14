<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function before(User $user): bool|null
    {
        if ($user->isAdmin()) {
            return true;
        }

        return null;
    }

    public function update(User $user, User $model): bool
    {
        return false;
    }
}