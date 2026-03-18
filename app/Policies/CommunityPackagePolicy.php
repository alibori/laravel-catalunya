<?php

declare(strict_types=1);

namespace App\Policies;

use App\Enums\CommunityPackage\CommunityPackageStatusEnum;
use App\Models\CommunityPackage;
use App\Models\User;

final class CommunityPackagePolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, CommunityPackage $communityPackage): bool
    {
        if ($user->is_admin) {
            return true;
        }

        return $user->id === $communityPackage->user_id;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, CommunityPackage $communityPackage): bool
    {
        if ($user->is_admin) {
            return true;
        }

        return $user->id === $communityPackage->user_id
            && CommunityPackageStatusEnum::Pending === $communityPackage->status;
    }

    public function delete(User $user, CommunityPackage $communityPackage): bool
    {
        if ($user->is_admin) {
            return true;
        }

        return $user->id === $communityPackage->user_id;
    }

    public function restore(User $user, CommunityPackage $communityPackage): bool
    {
        return $user->is_admin;
    }

    public function forceDelete(User $user, CommunityPackage $communityPackage): bool
    {
        return $user->is_admin;
    }
}
