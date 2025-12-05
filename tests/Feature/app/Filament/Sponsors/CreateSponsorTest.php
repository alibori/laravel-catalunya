<?php

declare(strict_types=1);

use App\Filament\Resources\Sponsors\Pages\CreateSponsor;
use App\Models\Sponsor;
use App\Models\User;

beforeEach(function (): void {
    $admin = User::factory()->create(['is_admin' => true]);

    $this->actingAs($admin);
});

test('can load the page', function (): void {
    Livewire::test(CreateSponsor::class)
        ->assertOk();
});

test('can create a sponsor', function (): void {
    $newSponsorData = Sponsor::factory()->make();

    Livewire::test(CreateSponsor::class)
        ->fillForm([
            'name' => $newSponsorData->name,
            'website' => $newSponsorData->website,
        ])
        ->call('create')
        ->assertNotified()
        ->assertRedirect();

    $this->assertDatabaseHas(Sponsor::class, [
        'name' => $newSponsorData->name,
        'website' => $newSponsorData->website,
    ]);
});

test('validates the form data', function (): void {
    $newSponsorData = Sponsor::factory()->make();

    Livewire::test(CreateSponsor::class)
        ->fillForm([
            'website' => $newSponsorData->website,
        ])
        ->call('create')
        ->assertHasFormErrors()
        ->assertNotNotified()
        ->assertNoRedirect();
});
