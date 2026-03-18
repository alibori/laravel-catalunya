<?php

declare(strict_types=1);

use App\Actions\CommunityPackages\GetApprovedCommunityPackagesAction;
use App\Models\CommunityPackage;

test('returns only approved packages', function (): void {
    CommunityPackage::factory()->approved()->count(3)->create();
    CommunityPackage::factory()->pending()->count(2)->create();
    CommunityPackage::factory()->rejected()->count(1)->create();

    $action = new GetApprovedCommunityPackagesAction();
    $result = $action->execute();

    expect($result)->toHaveCount(3);
});

test('returns empty when no approved packages exist', function (): void {
    CommunityPackage::factory()->pending()->count(2)->create();

    $action = new GetApprovedCommunityPackagesAction();
    $result = $action->execute();

    expect($result)->toHaveCount(0);
});

test('eager loads user relationship', function (): void {
    CommunityPackage::factory()->approved()->create();

    $action = new GetApprovedCommunityPackagesAction();
    $result = $action->execute();

    expect($result->first()->relationLoaded('user'))->toBeTrue();
});
