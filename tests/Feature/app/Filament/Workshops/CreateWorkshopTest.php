<?php

declare(strict_types=1);

use App\Filament\Resources\Workshops\Pages\CreateWorkshop;
use App\Models\User;
use App\Models\Workshop;

beforeEach(function (): void {
    $admin = User::factory()->create(['is_admin' => true]);

    $this->actingAs($admin);
});

test('can load the page', function (): void {
    Livewire::test(CreateWorkshop::class)
        ->assertOk();
});

test('can create a workshop', function (): void {
    $newWorkshopData = Workshop::factory()->make();

    Livewire::test(CreateWorkshop::class)
        ->fillForm([
            'title' => $newWorkshopData->title,
            'description' => $newWorkshopData->description,
            'scheduled_at' => $newWorkshopData->scheduled_at,
            'timezone' => $newWorkshopData->timezone,
            'location' => $newWorkshopData->location,
            'jitsi_url' => $newWorkshopData->jitsi_url,
            'jitsi_pass' => $newWorkshopData->jitsi_pass,
        ])
        ->call('create')
        ->assertNotified()
        ->assertRedirect();

    $this->assertDatabaseHas(Workshop::class, [
        'title' => $newWorkshopData->title,
        'location' => $newWorkshopData->location,
        'jitsi_url' => $newWorkshopData->jitsi_url,
        'jitsi_pass' => $newWorkshopData->jitsi_pass,
    ]);
});

test('validates the form data', function (): void {
    $newWorkshopData = Workshop::factory()->make();

    Livewire::test(CreateWorkshop::class)
        ->fillForm([
            'title' => $newWorkshopData->title,
        ])
        ->call('create')
        ->assertHasFormErrors()
        ->assertNotNotified()
        ->assertNoRedirect();
});
