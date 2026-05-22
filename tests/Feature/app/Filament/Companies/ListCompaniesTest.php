<?php

declare(strict_types=1);

use App\Filament\Resources\Companies\Pages\ListCompanies;
use App\Models\Company;
use App\Models\User;

beforeEach(function (): void {
    $admin = User::factory()->create(['is_admin' => true]);

    $this->actingAs($admin);
});

test('can load the page', function (): void {
    $companies = Company::factory()->count(5)->create();

    Livewire::test(ListCompanies::class)
        ->assertOk()
        ->assertCanSeeTableRecords($companies);
});
