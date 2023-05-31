<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function accessDashboard(User $user, string $role)
    {
        return $user->role && $user->role->name === $role;
    }
}
