<?php

declare(strict_types=1);

use App\Actions\Meetups\GetPastMeetupsAction;
use App\Models\Meetup;

test('returns paginated past meetups', function (): void {
    $pastMeetup = Meetup::factory()->create([
        'scheduled_at' => now()->subWeek(),
    ]);

    $action = new GetPastMeetupsAction();
    $result = $action->execute();

    expect($result->total())->toBe(1)
        ->and($result->items())->toHaveCount(1)
        ->and($result->items()[0]->id)->toBe($pastMeetup->id);
});

test('returns empty paginator when no past meetups exist', function (): void {
    Meetup::factory()->create([
        'scheduled_at' => now()->addWeek(),
    ]);

    $action = new GetPastMeetupsAction();
    $result = $action->execute();

    expect($result->total())->toBe(0)
        ->and($result->items())->toBeEmpty();
});

test('returns past meetups ordered by most recent first', function (): void {
    $oldestMeetup = Meetup::factory()->create([
        'scheduled_at' => now()->subMonths(2),
    ]);

    $newestMeetup = Meetup::factory()->create([
        'scheduled_at' => now()->subWeek(),
    ]);

    $middleMeetup = Meetup::factory()->create([
        'scheduled_at' => now()->subMonth(),
    ]);

    $action = new GetPastMeetupsAction();
    $result = $action->execute();

    expect($result->total())->toBe(3)
        ->and($result->items()[0]->id)->toBe($newestMeetup->id)
        ->and($result->items()[1]->id)->toBe($middleMeetup->id)
        ->and($result->items()[2]->id)->toBe($oldestMeetup->id);
});

test('excludes future meetups from results', function (): void {
    $pastMeetup = Meetup::factory()->create([
        'scheduled_at' => now()->subDay(),
    ]);

    $futureMeetup = Meetup::factory()->create([
        'scheduled_at' => now()->addDay(),
    ]);

    $action = new GetPastMeetupsAction();
    $result = $action->execute();

    expect($result->total())->toBe(1)
        ->and($result->items()[0]->id)->toBe($pastMeetup->id);
});

test('respects pagination parameters', function (): void {
    Meetup::factory()->count(15)->create([
        'scheduled_at' => now()->subDay(),
    ]);

    $action = new GetPastMeetupsAction();
    $result = $action->execute(perPage: 5);

    expect($result->total())->toBe(15)
        ->and($result->perPage())->toBe(5)
        ->and($result->items())->toHaveCount(5)
        ->and($result->hasPages())->toBeTrue();
});

test('excludes meetups scheduled for current time or later', function (): void {
    $pastMeetup = Meetup::factory()->create([
        'scheduled_at' => now()->subHour(),
    ]);

    $currentMeetup = Meetup::factory()->create([
        'scheduled_at' => now(),
    ]);

    $futureMeetup = Meetup::factory()->create([
        'scheduled_at' => now()->addHour(),
    ]);

    $action = new GetPastMeetupsAction();
    $result = $action->execute();

    expect($result->total())->toBe(1)
        ->and($result->items()[0]->id)->toBe($pastMeetup->id);
});
