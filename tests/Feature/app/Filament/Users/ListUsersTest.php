<?php

declare(strict_types=1);

use App\Models\User;
use App\Filament\Resources\Users\Pages\ListUsers;

beforeEach(function (): void {
    $admin = User::factory()->create(['is_admin' => true]);

    $this->actingAs($admin);
});

it('can load the page', function (): void {
    $users = User::factory()->count(5)->create();

    Livewire::test(ListUsers::class)
        ->assertOk()
        ->assertCanSeeTableRecords($users);
});
