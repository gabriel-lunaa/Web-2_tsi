<?php

namespace App\Policies;

use App\Models\Book;
use App\Models\User;

class BookPolicy
{
    public function before(User $user): bool|null
    {
        if ($user->isAdmin()) {
            return true;
        }

        return null;
    }

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Book $book): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->isBibliotecario();
    }

    public function update(User $user, Book $book): bool
    {
        return $user->isBibliotecario();
    }

    public function delete(User $user, Book $book): bool
    {
        return $user->isBibliotecario();
    }

    /**
     * Determina se o usuário pode restaurar o modelo.
     */
    public function restore(User $user, Book $book): bool
    {
        return false;
    }

    /**
     * Determina se o usuário pode excluir o modelo permanentemente..
     */
    public function forceDelete(User $user, Book $book): bool
    {
        return false;
    }
}
