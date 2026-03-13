<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\User;
use App\Models\Workshop;

final class WorkshopPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Workshop $workshop): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->is_admin;
    }

    public function update(User $user, Workshop $workshop): bool
    {
        return $user->is_admin;
    }

    public function delete(User $user, Workshop $workshop): bool
    {
        return $user->is_admin;
    }

    public function restore(User $user, Workshop $workshop): bool
    {
        return $user->is_admin;
    }

    public function forceDelete(User $user, Workshop $workshop): bool
    {
        return $user->is_admin;
    }
}
