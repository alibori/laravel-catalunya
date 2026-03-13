<?php

declare(strict_types=1);

use App\Filament\Resources\Workshops\Pages\EditWorkshop;
use App\Models\User;
use App\Models\Workshop;

beforeEach(function (): void {
    $admin = User::factory()->create(['is_admin' => true]);

    $this->actingAs($admin);
});

test('can load the page', function (): void {
    $workshop = Workshop::factory()->create();

    Livewire::test(EditWorkshop::class, ['record' => $workshop->getRouteKey()])
        ->assertOk();
});

test('can edit a workshop', function (): void {
    $workshop = Workshop::factory()->create();
    $newWorkshopData = Workshop::factory()->make();

    Livewire::test(EditWorkshop::class, ['record' => $workshop->getRouteKey()])
        ->fillForm([
            'title' => $newWorkshopData->title,
            'description' => $newWorkshopData->description,
            'scheduled_at' => $newWorkshopData->scheduled_at,
            'timezone' => $newWorkshopData->timezone,
            'location' => $newWorkshopData->location,
            'jitsi_url' => $newWorkshopData->jitsi_url,
            'jitsi_pass' => $newWorkshopData->jitsi_pass,
        ])
        ->call('save')
        ->assertNotified()
        ->assertNoRedirect();

    $this->assertDatabaseHas(Workshop::class, [
        'id' => $workshop->id,
        'title' => $newWorkshopData->title,
        'location' => $newWorkshopData->location,
        'jitsi_url' => $newWorkshopData->jitsi_url,
        'jitsi_pass' => $newWorkshopData->jitsi_pass,
    ]);
});

test('can delete a workshop', function (): void {
    $workshop = Workshop::factory()->create();

    Livewire::test(EditWorkshop::class, ['record' => $workshop->getRouteKey()])
        ->callAction('delete')
        ->assertRedirect();

    $this->assertDatabaseMissing(Workshop::class, [
        'id' => $workshop->id,
    ]);
});

test('validates the form data', function (): void {
    $workshop = Workshop::factory()->create();

    Livewire::test(EditWorkshop::class, ['record' => $workshop->getRouteKey()])
        ->fillForm([
            'title' => null,
            'description' => null,
            'scheduled_at' => null,
            'timezone' => null,
            'jitsi_url' => null,
            'jitsi_pass' => null,
        ])
        ->call('save')
        ->assertHasFormErrors()
        ->assertNotNotified()
        ->assertNoRedirect();
});
