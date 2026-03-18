<?php

declare(strict_types=1);

use App\Models\CommunityPackage;

test('displays the community packages page successfully', function (): void {
    $response = $this->get(route('community-packages'));

    $response->assertStatus(200)
        ->assertViewIs('community-packages');
});

test('displays approved packages', function (): void {
    $package = CommunityPackage::factory()->approved()->create([
        'name' => 'Laravel Catalunya Package',
    ]);

    $response = $this->get(route('community-packages'));

    $response->assertStatus(200)
        ->assertSee('Laravel Catalunya Package');
});

test('does not display pending or rejected packages', function (): void {
    CommunityPackage::factory()->pending()->create([
        'name' => 'Pending Package',
    ]);

    CommunityPackage::factory()->rejected()->create([
        'name' => 'Rejected Package',
    ]);

    $response = $this->get(route('community-packages'));

    $response->assertStatus(200)
        ->assertDontSee('Pending Package')
        ->assertDontSee('Rejected Package');
});

test('displays empty state when no approved packages', function (): void {
    $response = $this->get(route('community-packages'));

    $response->assertStatus(200)
        ->assertSee('Encara no hi ha cap paquet publicat');
});

test('displays encouraging text', function (): void {
    $response = $this->get(route('community-packages'));

    $response->assertStatus(200)
        ->assertSee('Paquets de la Comunitat')
        ->assertSee('Junts fem cr');
});

test('passes packages to view', function (): void {
    CommunityPackage::factory()->approved()->create();

    $response = $this->get(route('community-packages'));

    $response->assertStatus(200)
        ->assertViewHas('packages');
});
