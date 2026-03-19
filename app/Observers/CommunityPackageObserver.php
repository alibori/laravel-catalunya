<?php

declare(strict_types=1);

namespace App\Observers;

use App\Models\CommunityPackage;
use Illuminate\Support\Str;

final class CommunityPackageObserver
{
    public function creating(CommunityPackage $communityPackage): void
    {
        if (empty($communityPackage->slug)) {
            $communityPackage->slug = Str::slug($communityPackage->name);
        }
    }
}
