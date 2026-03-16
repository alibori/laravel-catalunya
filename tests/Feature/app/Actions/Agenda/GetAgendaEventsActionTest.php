<?php

declare(strict_types=1);

use App\Actions\Agenda\GetAgendaEventsAction;
use App\Models\Meetup;
use App\Models\Workshop;

test('returns empty collection when no events exist', function (): void {
    $action = new GetAgendaEventsAction();
    $result = $action->execute();

    expect($result)->toBeEmpty();
});

test('returns meetups and workshops merged together', function (): void {
    $meetup = Meetup::factory()->create([
        'scheduled_at' => now()->addWeek(),
    ]);

    $workshop = Workshop::factory()->create([
        'scheduled_at' => now()->addDays(3),
    ]);

    $action = new GetAgendaEventsAction();
    $result = $action->execute();

    expect($result)->toHaveCount(2);
});

test('results are sorted by scheduled_at descending', function (): void {
    $oldMeetup = Meetup::factory()->create([
        'scheduled_at' => now()->subMonth(),
    ]);

    $recentWorkshop = Workshop::factory()->create([
        'scheduled_at' => now()->addWeek(),
    ]);

    $futureMeetup = Meetup::factory()->create([
        'scheduled_at' => now()->addMonth(),
    ]);

    $action = new GetAgendaEventsAction();
    $result = $action->execute();

    expect($result)->toHaveCount(3)
        ->and($result[0]->id)->toBe($futureMeetup->id)
        ->and($result[1]->id)->toBe($recentWorkshop->id)
        ->and($result[2]->id)->toBe($oldMeetup->id);
});

test('includes both future and past events', function (): void {
    Meetup::factory()->create([
        'scheduled_at' => now()->subWeek(),
    ]);

    Workshop::factory()->create([
        'scheduled_at' => now()->addWeek(),
    ]);

    $action = new GetAgendaEventsAction();
    $result = $action->execute();

    expect($result)->toHaveCount(2);
});
