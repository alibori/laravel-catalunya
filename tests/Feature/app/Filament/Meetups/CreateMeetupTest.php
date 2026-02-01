<?php

declare(strict_types=1);

use App\Filament\Resources\Meetups\Pages\CreateMeetup;
use App\Models\Meetup;
use App\Models\User;

beforeEach(function (): void {
    $admin = User::factory()->create(['is_admin' => true]);

    $this->actingAs($admin);
});

test('can load the page', function (): void {
    Livewire::test(CreateMeetup::class)
        ->assertOk();
});

test('can create a meetup', function (): void {
    $newMeetupData = Meetup::factory()->make();

    Livewire::test(CreateMeetup::class)
        ->fillForm([
            'title' => $newMeetupData->title,
            'description' => $newMeetupData->description,
            'scheduled_at' => $newMeetupData->scheduled_at,
            'timezone' => $newMeetupData->timezone,
            'location' => $newMeetupData->location,
        ])
        ->call('create')
        ->assertNotified()
        ->assertRedirect();

    $this->assertDatabaseHas(Meetup::class, [
        'title' => $newMeetupData->title,
        'location' => $newMeetupData->location,
    ]);
});

test('validates the form data', function (): void {
    $newMeetupData = Meetup::factory()->make();

    Livewire::test(CreateMeetup::class)
        ->fillForm([
            'title' => $newMeetupData->title,
        ])
        ->call('create')
        ->assertHasFormErrors()
        ->assertNotNotified()
        ->assertNoRedirect();
});
