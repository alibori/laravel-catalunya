<?php

declare(strict_types=1);

use App\Livewire\SponsorsDisplay;
use App\Models\Sponsor;
use Livewire\Livewire;

test('renders successfully', function (): void {
    Livewire::test(SponsorsDisplay::class)
        ->assertStatus(200);
});

test('displays recruitment card when no sponsors exist', function (): void {
    Livewire::test(SponsorsDisplay::class)
        ->assertSee('Sigues el primer patrocinador')
        ->assertSee('Beneficis del patrocini:')
        ->assertSee('Visibilitat al web')
        ->assertSee('Menció als esdeveniments')
        ->assertSee('Suport a la comunitat')
        ->assertSee('Converteix-te en patrocinador');
});

test('displays sponsors grid when sponsors exist', function (): void {
    $sponsor = Sponsor::factory()->create([
        'name' => 'Test Company',
        'website' => 'https://example.com',
    ]);

    Livewire::test(SponsorsDisplay::class)
        ->assertSee('Test Company')
        ->assertSee('https://example.com')
        ->assertDontSee('Sigues el primer patrocinador')
        ->assertSee('Vols patrocinar-nos?');
});

test('displays multiple sponsors in grid', function (): void {
    $sponsors = Sponsor::factory()->count(3)->create();

    Livewire::test(SponsorsDisplay::class)
        ->assertSee($sponsors[0]->name)
        ->assertSee($sponsors[1]->name)
        ->assertSee($sponsors[2]->name);
});

test('displays sponsor logo when logo path exists', function (): void {
    $sponsor = Sponsor::factory()->create([
        'name' => 'Test Company',
        'logo_path' => 'sponsors/logos/test-logo.png',
    ]);

    Livewire::test(SponsorsDisplay::class)
        ->assertSee('Logo de Test Company')
        ->assertSee($sponsor->logo_url);
});

test('displays sponsor name when no logo exists', function (): void {
    $sponsor = Sponsor::factory()->create([
        'name' => 'No Logo Company',
        'logo_path' => null,
    ]);

    Livewire::test(SponsorsDisplay::class)
        ->assertSee('No Logo Company');
});

test('displays call to action for more sponsors when sponsors exist', function (): void {
    Sponsor::factory()->create();

    Livewire::test(SponsorsDisplay::class)
        ->assertSee('Vols patrocinar-nos?')
        ->assertSee('Ajuda', escape: false)
        ->assertSee('Converteix-te en patrocinador');
});

test('each sponsor has correct link attributes', function (): void {
    $sponsor = Sponsor::factory()->create([
        'name' => 'Test Company',
        'website' => 'https://example.com',
    ]);

    $component = Livewire::test(SponsorsDisplay::class);

    $component->assertSee('Visita Test Company');
});

test('sponsors are ordered by creation date', function (): void {
    $secondSponsor = Sponsor::factory()->create([
        'name' => 'Second Sponsor',
        'created_at' => now()->addDay(),
    ]);

    $firstSponsor = Sponsor::factory()->create([
        'name' => 'First Sponsor',
        'created_at' => now(),
    ]);

    $component = Livewire::test(SponsorsDisplay::class);

    $html = $component->html();
    $firstPos = mb_strpos($html, 'First Sponsor');
    $secondPos = mb_strpos($html, 'Second Sponsor');

    expect($firstPos)->toBeLessThan($secondPos);
});
