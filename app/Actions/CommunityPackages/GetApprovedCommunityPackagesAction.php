<?php

declare(strict_types=1);

namespace App\Actions\CommunityPackages;

use App\Enums\CommunityPackage\CommunityPackageStatusEnum;
use App\Models\CommunityPackage;
use Illuminate\Pagination\LengthAwarePaginator;

final readonly class GetApprovedCommunityPackagesAction
{
    /**
     * @return LengthAwarePaginator<int, CommunityPackage>
     */
    public function execute(int $perPage = 12): LengthAwarePaginator
    {
        return CommunityPackage::query()
            ->where('status', CommunityPackageStatusEnum::Approved)
            ->with('user')
            ->latest()
            ->paginate($perPage);
    }
}
