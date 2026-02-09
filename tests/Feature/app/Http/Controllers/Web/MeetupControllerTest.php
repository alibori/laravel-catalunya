<?php

declare(strict_types=1);

use App\Models\Meetup;

test('displays the meetups page successfully', function (): void {
    $response = $this->get(route('meetups'));

    $response->assertStatus(200)
        ->assertViewIs('meetups');
});

test('displays next upcoming meetup when available', function (): void {
    $meetup = Meetup::factory()->create([
        'title' => 'Next Laravel Meetup',
        'scheduled_at' => now()->addWeek(),
    ]);

    $response = $this->get(route('meetups'));

    $response->assertStatus(200)
        ->assertSee('Next Laravel Meetup')
        ->assertSee('Proper Meetup');
});

test('displays empty state when no upcoming meetup', function (): void {
    Meetup::factory()->create([
        'scheduled_at' => now()->subWeek(),
    ]);

    $response = $this->get(route('meetups'));

    $response->assertStatus(200)
        ->assertSee('Encara no hi ha cap meetup programat');
});

test('displays past meetups section when available', function (): void {
    $pastMeetup = Meetup::factory()->create([
        'title' => 'Past Laravel Meetup',
        'scheduled_at' => now()->subWeek(),
    ]);

    $response = $this->get(route('meetups'));

    $response->assertStatus(200)
        ->assertSee('Meetups Anteriors')
        ->assertSee('Past Laravel Meetup');
});

test('does not display past meetups section when none exist', function (): void {
    Meetup::factory()->create([
        'scheduled_at' => now()->addWeek(),
    ]);

    $response = $this->get(route('meetups'));

    $response->assertStatus(200)
        ->assertDontSee('Meetups Anteriors');
});

test('displays both next meetup and past meetups when available', function (): void {
    $nextMeetup = Meetup::factory()->create([
        'title' => 'Upcoming Laravel Meetup',
        'scheduled_at' => now()->addWeek(),
    ]);

    $pastMeetup = Meetup::factory()->create([
        'title' => 'Past Laravel Meetup',
        'scheduled_at' => now()->subWeek(),
    ]);

    $response = $this->get(route('meetups'));

    $response->assertStatus(200)
        ->assertSee('Proper Meetup')
        ->assertSee('Upcoming Laravel Meetup')
        ->assertSee('Meetups Anteriors')
        ->assertSee('Past Laravel Meetup');
});

test('passes meetup and past meetups to view', function (): void {
    $nextMeetup = Meetup::factory()->create([
        'scheduled_at' => now()->addWeek(),
    ]);

    $pastMeetup = Meetup::factory()->create([
        'scheduled_at' => now()->subWeek(),
    ]);

    $response = $this->get(route('meetups'));

    $response->assertStatus(200)
        ->assertViewHas('meetup')
        ->assertViewHas('pastMeetups');
});
