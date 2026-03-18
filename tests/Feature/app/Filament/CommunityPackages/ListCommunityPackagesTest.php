<?php

declare(strict_types=1);

use App\Filament\Resources\CommunityPackages\Pages\ListCommunityPackages;
use App\Models\CommunityPackage;
use App\Models\User;

beforeEach(function (): void {
    $admin = User::factory()->create(['is_admin' => true]);

    $this->actingAs($admin);
});

test('can load the page', function (): void {
    $packages = CommunityPackage::factory()->count(5)->create();

    Livewire::test(ListCommunityPackages::class)
        ->assertOk()
        ->assertCanSeeTableRecords($packages);
});

test('non admin user only sees own community packages', function (): void {
    $packages = CommunityPackage::factory()->count(5)->create();

    $user = User::factory()->create();

    $ownPackages = CommunityPackage::factory()->count(3)->create([
        'user_id' => $user->id,
    ]);

    $this->actingAs($user);

    Livewire::test(ListCommunityPackages::class)
        ->assertOk()
        ->assertCanSeeTableRecords($ownPackages)
        ->assertCanNotSeeTableRecords($packages);
});
