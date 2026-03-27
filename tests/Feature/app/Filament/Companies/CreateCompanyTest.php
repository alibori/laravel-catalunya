<?php

declare(strict_types=1);

use App\Filament\Resources\Companies\Pages\CreateCompany;
use App\Models\Company;
use App\Models\User;

beforeEach(function (): void {
    $admin = User::factory()->create(['is_admin' => true]);

    $this->actingAs($admin);
});

test('can load the page', function (): void {
    Livewire::test(CreateCompany::class)
        ->assertOk();
});

test('can create a company', function (): void {
    $newCompanyData = Company::factory()->make();

    Livewire::test(CreateCompany::class)
        ->fillForm([
            'name' => $newCompanyData->name,
            'description' => $newCompanyData->description,
            'website' => $newCompanyData->website,
            'industry' => $newCompanyData->industry,
            'location' => $newCompanyData->location,
            'is_visible' => true,
        ])
        ->call('create')
        ->assertNotified()
        ->assertRedirect();

    $this->assertDatabaseHas(Company::class, [
        'name' => $newCompanyData->name,
    ]);
});

test('validates the form data', function (): void {
    Livewire::test(CreateCompany::class)
        ->fillForm([
            'name' => null,
            'description' => null,
        ])
        ->call('create')
        ->assertHasFormErrors()
        ->assertNotNotified()
        ->assertNoRedirect();
});
