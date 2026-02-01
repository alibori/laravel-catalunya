<?php

declare(strict_types=1);

use App\Filament\Resources\Meetups\Pages\ListMeetups;
use App\Models\Meetup;
use App\Models\User;

beforeEach(function (): void {
    $admin = User::factory()->create(['is_admin' => true]);

    $this->actingAs($admin);
});

test('can load the page', function (): void {
    $meetups = Meetup::factory()->count(5)->create();

    Livewire::test(ListMeetups::class)
        ->assertOk()
        ->assertCanSeeTableRecords($meetups);
});
