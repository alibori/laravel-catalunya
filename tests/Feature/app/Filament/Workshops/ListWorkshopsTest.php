<?php

declare(strict_types=1);

use App\Filament\Resources\Workshops\Pages\ListWorkshops;
use App\Models\User;
use App\Models\Workshop;

beforeEach(function (): void {
    $admin = User::factory()->create(['is_admin' => true]);

    $this->actingAs($admin);
});

test('can load the page', function (): void {
    $workshops = Workshop::factory()->count(5)->create();

    Livewire::test(ListWorkshops::class)
        ->assertOk()
        ->assertCanSeeTableRecords($workshops);
});
