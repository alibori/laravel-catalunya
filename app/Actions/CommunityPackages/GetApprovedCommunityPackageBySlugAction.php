<?php

declare(strict_types=1);

namespace App\Actions\CommunityPackages;

use App\Enums\CommunityPackage\CommunityPackageStatusEnum;
use App\Models\CommunityPackage;

final readonly class GetApprovedCommunityPackageBySlugAction
{
    public function execute(string $slug): CommunityPackage
    {
        return CommunityPackage::query()
            ->where('status', CommunityPackageStatusEnum::Approved)
            ->where('slug', $slug)
            ->with('user')
            ->firstOrFail();
    }
}
