<?php

declare(strict_types=1);

use App\Filament\Resources\Sponsors\Pages\ListSponsors;
use App\Models\Sponsor;
use App\Models\User;

beforeEach(function (): void {
    $admin = User::factory()->create(['is_admin' => true]);

    $this->actingAs($admin);
});

it('can load the page', function (): void {
    $sponsors = Sponsor::factory()->count(5)->create();

    Livewire::test(ListSponsors::class)
        ->assertOk()
        ->assertCanSeeTableRecords($sponsors);
});
