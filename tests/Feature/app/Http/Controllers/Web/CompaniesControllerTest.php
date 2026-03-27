<?php

declare(strict_types=1);

use App\Models\Company;

test('displays the companies page successfully', function (): void {
    $response = $this->get(route('companies'));

    $response->assertStatus(200)
        ->assertViewIs('companies');
});

test('displays visible companies', function (): void {
    $company = Company::factory()->visible()->create([
        'name' => 'Laravel Catalunya Company',
    ]);

    $response = $this->get(route('companies'));

    $response->assertStatus(200)
        ->assertSee('Laravel Catalunya Company');
});

test('does not display hidden companies', function (): void {
    Company::factory()->hidden()->create([
        'name' => 'Hidden Company',
    ]);

    $response = $this->get(route('companies'));

    $response->assertStatus(200)
        ->assertDontSee('Hidden Company');
});

test('displays empty state when no visible companies', function (): void {
    $response = $this->get(route('companies'));

    $response->assertStatus(200)
        ->assertSee('Encara no hi ha cap empresa publicada');
});

test('displays encouraging email message', function (): void {
    $response = $this->get(route('companies'));

    $response->assertStatus(200)
        ->assertSee('Qui utilitza Laravel?')
        ->assertSee('info@laravelcatalunya.cat');
});

test('passes companies to view', function (): void {
    Company::factory()->visible()->create();

    $response = $this->get(route('companies'));

    $response->assertStatus(200)
        ->assertViewHas('companies');
});
