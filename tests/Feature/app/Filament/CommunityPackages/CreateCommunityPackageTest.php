<?php

declare(strict_types=1);

use App\Enums\CommunityPackage\CommunityPackageStatusEnum;
use App\Filament\Resources\CommunityPackages\Pages\CreateCommunityPackage;
use App\Models\CommunityPackage;
use App\Models\User;

beforeEach(function (): void {
    $admin = User::factory()->create(['is_admin' => true]);

    $this->actingAs($admin);
});

test('can load the page', function (): void {
    Livewire::test(CreateCommunityPackage::class)
        ->assertOk();
});

test('admin can create a community package', function (): void {
    $newPackageData = CommunityPackage::factory()->make();

    Livewire::test(CreateCommunityPackage::class)
        ->fillForm([
            'user_id' => $newPackageData->user_id,
            'name' => $newPackageData->name,
            'description' => $newPackageData->description,
            'url' => $newPackageData->url,
            'status' => $newPackageData->status,
        ])
        ->call('create')
        ->assertNotified()
        ->assertRedirect();

    $this->assertDatabaseHas(CommunityPackage::class, [
        'user_id' => $newPackageData->user_id,
        'name' => $newPackageData->name,
        'url' => $newPackageData->url,
    ]);
});

test('non admin user creates package with pending status', function (): void {
    $user = User::factory()->create();

    $this->actingAs($user);

    Livewire::test(CreateCommunityPackage::class)
        ->fillForm([
            'name' => 'My Package',
            'description' => 'A great package',
            'url' => 'https://github.com/example/package',
        ])
        ->call('create')
        ->assertNotified()
        ->assertRedirect();

    $this->assertDatabaseHas(CommunityPackage::class, [
        'user_id' => $user->id,
        'name' => 'My Package',
        'status' => CommunityPackageStatusEnum::Pending->value,
    ]);
});

test('validates the form data', function (): void {
    Livewire::test(CreateCommunityPackage::class)
        ->fillForm([
            'name' => 'Test',
        ])
        ->call('create')
        ->assertHasFormErrors()
        ->assertNotNotified()
        ->assertNoRedirect();
});
