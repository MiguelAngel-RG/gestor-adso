<?php

namespace App\Policies;

use App\Models\Aprendiz;
use App\Models\User;

class AprendizPolicy
{
    public function viewAny(User $user): bool
    {
        return true; // Todos los roles autenticados pueden ver la lista
    }

    public function view(User $user, Aprendiz $aprendiz): bool
    {
        return true; // Todos los roles pueden ver el detalle
    }

    public function create(User $user): bool
    {
        return $user->isAdmin() || $user->isInstructor();
    }

    public function update(User $user, Aprendiz $aprendiz): bool
    {
        return $user->isAdmin() || $user->isInstructor();
    }

    public function delete(User $user, Aprendiz $aprendiz): bool
    {
        return $user->isAdmin() || $user->isInstructor();
    }
}