<?php

declare(strict_types=1);

namespace App\Actions\CommunityPackages;

use App\Enums\CommunityPackage\CommunityPackageStatusEnum;
use App\Models\CommunityPackage;

final readonly class ApproveCommunityPackageAction
{
    public function execute(CommunityPackage $communityPackage): CommunityPackage
    {
        $communityPackage->update([
            'status' => CommunityPackageStatusEnum::Approved,
        ]);

        return $communityPackage;
    }
}
