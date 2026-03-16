<?php

declare(strict_types=1);

use App\Models\Meetup;
use App\Models\Workshop;

test('displays the agenda page successfully', function (): void {
    $response = $this->get(route('agenda'));

    $response->assertStatus(200)
        ->assertViewIs('agenda');
});

test('displays meetup and workshop titles on the agenda', function (): void {
    Meetup::factory()->create([
        'title' => 'Laravel Catalunya Meetup',
        'scheduled_at' => now()->addWeek(),
    ]);

    Workshop::factory()->create([
        'title' => 'TDD Workshop',
        'scheduled_at' => now()->addDays(3),
    ]);

    $response = $this->get(route('agenda'));

    $response->assertStatus(200)
        ->assertSee('Laravel Catalunya Meetup')
        ->assertSee('TDD Workshop');
});

test('displays empty state when no events exist', function (): void {
    $response = $this->get(route('agenda'));

    $response->assertStatus(200)
        ->assertSee('Encara no hi ha cap esdeveniment programat');
});

test('passes events to view', function (): void {
    Meetup::factory()->create([
        'scheduled_at' => now()->addWeek(),
    ]);

    $response = $this->get(route('agenda'));

    $response->assertStatus(200)
        ->assertViewHas('events');
});

test('old meetups url redirects to agenda', function (): void {
    $response = $this->get('/meetups');

    $response->assertRedirect('/agenda');
});
