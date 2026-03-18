<?php

declare(strict_types=1);

use App\Livewire\SponsorsDisplay;
use App\Models\Sponsor;

test('welcome page loads successfully', function (): void {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('welcome page displays sponsors section', function (): void {
    $response = $this->get('/');

    $response
        ->assertStatus(200)
        ->assertSee('Patrocinadors')
        ->assertSeeLivewire(SponsorsDisplay::class);
});

test('welcome page displays sponsors when they exist', function (): void {
    $sponsor = Sponsor::factory()->create([
        'name' => 'Welcome Test Sponsor',
        'website' => 'https://welcome.test',
    ]);

    $response = $this->get('/');

    $response
        ->assertStatus(200)
        ->assertSee('Welcome Test Sponsor');
});

test('welcome page displays recruitment card when no sponsors', function (): void {
    $response = $this->get('/');

    $response
        ->assertStatus(200)
        ->assertSee('Sigues el primer patrocinador');
});
