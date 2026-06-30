<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function before(User $user): bool|null
    {
        if ($user->role === 'admin') {
            return true;
        }

        return null;
    }

    public function update(User $user): bool
    {
        return false;
    }
}