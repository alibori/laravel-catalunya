<?php

declare(strict_types=1);

use App\Actions\CommunityPackages\GetApprovedCommunityPackageBySlugAction;
use App\Models\CommunityPackage;
use Illuminate\Database\Eloquent\ModelNotFoundException;

test('returns an approved community package by slug', function (): void {
    $package = CommunityPackage::factory()->approved()->create([
        'slug' => 'test-package',
    ]);

    $action = new GetApprovedCommunityPackageBySlugAction();

    $result = $action->execute('test-package');

    expect($result->id)->toBe($package->id);
    expect($result->relationLoaded('user'))->toBeTrue();
});

test('throws exception for non-approved package', function (): void {
    CommunityPackage::factory()->pending()->create([
        'slug' => 'pending-package',
    ]);

    $action = new GetApprovedCommunityPackageBySlugAction();

    $action->execute('pending-package');
})->throws(ModelNotFoundException::class);

test('throws exception for non-existent slug', function (): void {
    $action = new GetApprovedCommunityPackageBySlugAction();

    $action->execute('non-existent');
})->throws(ModelNotFoundException::class);
