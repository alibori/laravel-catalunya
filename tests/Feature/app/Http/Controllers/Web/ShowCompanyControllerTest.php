<?php

declare(strict_types=1);

use App\Models\Company;

test('displays a visible company detail page', function (): void {
    $company = Company::factory()->visible()->create([
        'name' => 'My Great Company',
        'slug' => 'my-great-company',
        'description' => 'A wonderful company using Laravel.',
    ]);

    $response = $this->get(route('companies.show', $company->slug));

    $response->assertStatus(200)
        ->assertViewIs('company-show')
        ->assertViewHas('company')
        ->assertSee('My Great Company')
        ->assertSee('A wonderful company using Laravel.');
});

test('returns 404 for hidden companies', function (): void {
    $company = Company::factory()->hidden()->create([
        'slug' => 'hidden-company',
    ]);

    $response = $this->get(route('companies.show', $company->slug));

    $response->assertStatus(404);
});

test('returns 404 for non-existent slug', function (): void {
    $response = $this->get(route('companies.show', 'non-existent-company'));

    $response->assertStatus(404);
});
