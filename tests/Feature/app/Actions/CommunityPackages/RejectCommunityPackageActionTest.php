<?php

declare(strict_types=1);

use App\Actions\CommunityPackages\RejectCommunityPackageAction;
use App\Enums\CommunityPackage\CommunityPackageStatusEnum;
use App\Models\CommunityPackage;

test('changes status from pending to rejected', function (): void {
    $package = CommunityPackage::factory()->pending()->create();

    $action = new RejectCommunityPackageAction();
    $result = $action->execute($package);

    expect($result->status)->toBe(CommunityPackageStatusEnum::Rejected);
    expect($package->refresh()->status)->toBe(CommunityPackageStatusEnum::Rejected);
});
