<?php

declare(strict_types=1);

use App\Filament\Resources\Meetups\Pages\EditMeetup;
use App\Models\Meetup;
use App\Models\User;

beforeEach(function (): void {
    $admin = User::factory()->create(['is_admin' => true]);

    $this->actingAs($admin);
});

test('can load the page', function (): void {
    $meetup = Meetup::factory()->create();

    Livewire::test(EditMeetup::class, ['record' => $meetup->getRouteKey()])
        ->assertOk();
});

test('can edit a meetup', function (): void {
    $meetup = Meetup::factory()->create();
    $newMeetupData = Meetup::factory()->make();

    Livewire::test(EditMeetup::class, ['record' => $meetup->getRouteKey()])
        ->fillForm([
            'title' => $newMeetupData->title,
            'description' => $newMeetupData->description,
            'scheduled_at' => $newMeetupData->scheduled_at,
            'timezone' => $newMeetupData->timezone,
            'location' => $newMeetupData->location,
        ])
        ->call('save')
        ->assertNotified()
        ->assertNoRedirect();

    $this->assertDatabaseHas(Meetup::class, [
        'id' => $meetup->id,
        'title' => $newMeetupData->title,
        'location' => $newMeetupData->location,
    ]);
});

test('can delete a meetup', function (): void {
    $meetup = Meetup::factory()->create();

    Livewire::test(EditMeetup::class, ['record' => $meetup->getRouteKey()])
        ->callAction('delete')
        ->assertRedirect();

    $this->assertDatabaseMissing(Meetup::class, [
        'id' => $meetup->id,
    ]);
});

test('validates the form data', function (): void {
    $meetup = Meetup::factory()->create();

    Livewire::test(EditMeetup::class, ['record' => $meetup->getRouteKey()])
        ->fillForm([
            'title' => null,
            'description' => null,
            'scheduled_at' => null,
            'timezone' => null,
        ])
        ->call('save')
        ->assertHasFormErrors()
        ->assertNotNotified()
        ->assertNoRedirect();
});
