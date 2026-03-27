<?php

declare(strict_types=1);

use App\Filament\Resources\Companies\Pages\EditCompany;
use App\Models\Company;
use App\Models\User;

beforeEach(function (): void {
    $admin = User::factory()->create(['is_admin' => true]);

    $this->actingAs($admin);
});

test('can load the page', function (): void {
    $company = Company::factory()->create();

    Livewire::test(EditCompany::class, ['record' => $company->getRouteKey()])
        ->assertOk();
});

test('can update a company', function (): void {
    $company = Company::factory()->create();

    Livewire::test(EditCompany::class, ['record' => $company->getRouteKey()])
        ->fillForm([
            'name' => 'Updated Company Name',
        ])
        ->call('save')
        ->assertNotified();

    $this->assertDatabaseHas(Company::class, [
        'id' => $company->id,
        'name' => 'Updated Company Name',
    ]);
});
