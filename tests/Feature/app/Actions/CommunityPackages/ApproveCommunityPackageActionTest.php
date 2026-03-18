<?php

declare(strict_types=1);

use App\Actions\CommunityPackages\ApproveCommunityPackageAction;
use App\Enums\CommunityPackage\CommunityPackageStatusEnum;
use App\Models\CommunityPackage;

test('changes status from pending to approved', function (): void {
    $package = CommunityPackage::factory()->pending()->create();

    $action = new ApproveCommunityPackageAction();
    $result = $action->execute($package);

    expect($result->status)->toBe(CommunityPackageStatusEnum::Approved);
    expect($package->refresh()->status)->toBe(CommunityPackageStatusEnum::Approved);
});
