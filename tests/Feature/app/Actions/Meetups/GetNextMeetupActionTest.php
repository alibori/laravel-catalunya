<?php

declare(strict_types=1);

use App\Actions\Meetups\GetNextMeetupAction;
use App\Models\Meetup;

test('returns the next upcoming meetup', function (): void {
    $futureMeetup = Meetup::factory()->create([
        'scheduled_at' => now()->addWeek(),
    ]);

    $action = new GetNextMeetupAction();
    $result = $action->execute();

    expect($result)
        ->not->toBeNull()
        ->id->toBe($futureMeetup->id);
});

test('returns null when no upcoming meetups exist', function (): void {
    Meetup::factory()->create([
        'scheduled_at' => now()->subWeek(),
    ]);

    $action = new GetNextMeetupAction();
    $result = $action->execute();

    expect($result)->toBeNull();
});

test('returns the closest upcoming meetup when multiple exist', function (): void {
    $farMeetup = Meetup::factory()->create([
        'scheduled_at' => now()->addMonth(),
    ]);

    $closestMeetup = Meetup::factory()->create([
        'scheduled_at' => now()->addWeek(),
    ]);

    $furthestMeetup = Meetup::factory()->create([
        'scheduled_at' => now()->addMonths(2),
    ]);

    $action = new GetNextMeetupAction();
    $result = $action->execute();

    expect($result)
        ->not->toBeNull()
        ->id->toBe($closestMeetup->id);
});

test('excludes past meetups from results', function (): void {
    $pastMeetup = Meetup::factory()->create([
        'scheduled_at' => now()->subDay(),
    ]);

    $futureMeetup = Meetup::factory()->create([
        'scheduled_at' => now()->addDay(),
    ]);

    $action = new GetNextMeetupAction();
    $result = $action->execute();

    expect($result)
        ->not->toBeNull()
        ->id->toBe($futureMeetup->id);
});

test('includes meetups scheduled for today', function (): void {
    $todayMeetup = Meetup::factory()->create([
        'scheduled_at' => now()->addHour(),
    ]);

    $action = new GetNextMeetupAction();
    $result = $action->execute();

    expect($result)
        ->not->toBeNull()
        ->id->toBe($todayMeetup->id);
});
