<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Meetup;
use App\Models\User;

final class MeetupPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Meetup $meetup): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->is_admin;
    }

    public function update(User $user, Meetup $meetup): bool
    {
        return $user->is_admin;
    }

    public function delete(User $user, Meetup $meetup): bool
    {
        return $user->is_admin;
    }

    public function restore(User $user, Meetup $meetup): bool
    {
        return $user->is_admin;
    }

    public function forceDelete(User $user, Meetup $meetup): bool
    {
        return $user->is_admin;
    }
}
