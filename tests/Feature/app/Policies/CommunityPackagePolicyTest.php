<?php

declare(strict_types=1);

use App\Models\CommunityPackage;
use App\Models\User;

test('admin can update any package', function (): void {
    $admin = User::factory()->create(['is_admin' => true]);
    $package = CommunityPackage::factory()->pending()->create();

    expect($admin->can('update', $package))->toBeTrue();
});

test('user can update own pending package', function (): void {
    $user = User::factory()->create();
    $package = CommunityPackage::factory()->pending()->create(['user_id' => $user->id]);

    expect($user->can('update', $package))->toBeTrue();
});

test('user cannot update other users package', function (): void {
    $user = User::factory()->create();
    $package = CommunityPackage::factory()->pending()->create();

    expect($user->can('update', $package))->toBeFalse();
});

test('user cannot update approved package', function (): void {
    $user = User::factory()->create();
    $package = CommunityPackage::factory()->approved()->create(['user_id' => $user->id]);

    expect($user->can('update', $package))->toBeFalse();
});

test('user can delete own package', function (): void {
    $user = User::factory()->create();
    $package = CommunityPackage::factory()->create(['user_id' => $user->id]);

    expect($user->can('delete', $package))->toBeTrue();
});

test('user cannot delete other users package', function (): void {
    $user = User::factory()->create();
    $package = CommunityPackage::factory()->create();

    expect($user->can('delete', $package))->toBeFalse();
});
