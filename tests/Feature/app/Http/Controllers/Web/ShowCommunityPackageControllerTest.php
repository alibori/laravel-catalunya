<?php

declare(strict_types=1);

use App\Models\CommunityPackage;

test('displays an approved community package detail page', function (): void {
    $package = CommunityPackage::factory()->approved()->create([
        'name' => 'My Great Package',
        'slug' => 'my-great-package',
        'description' => 'A wonderful package for the community.',
    ]);

    $response = $this->get(route('community-packages.show', $package->slug));

    $response->assertStatus(200)
        ->assertViewIs('community-package-show')
        ->assertViewHas('package')
        ->assertSee('My Great Package')
        ->assertSee('A wonderful package for the community.');
});

test('returns 404 for pending packages', function (): void {
    $package = CommunityPackage::factory()->pending()->create([
        'slug' => 'pending-package',
    ]);

    $response = $this->get(route('community-packages.show', $package->slug));

    $response->assertStatus(404);
});

test('returns 404 for rejected packages', function (): void {
    $package = CommunityPackage::factory()->rejected()->create([
        'slug' => 'rejected-package',
    ]);

    $response = $this->get(route('community-packages.show', $package->slug));

    $response->assertStatus(404);
});

test('returns 404 for non-existent slug', function (): void {
    $response = $this->get(route('community-packages.show', 'non-existent-package'));

    $response->assertStatus(404);
});
