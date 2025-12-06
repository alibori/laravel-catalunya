<?php

declare(strict_types=1);

use App\Filament\Resources\Users\Pages\CreateUser;
use App\Models\User;

beforeEach(function (): void {
    $admin = User::factory()->create(['is_admin' => true]);

    $this->actingAs($admin);
});

test('can load the page', function (): void {
    Livewire::test(CreateUser::class)
        ->assertOk();
});

test('can create a user', function (): void {
    $newUserData = User::factory()->make();

    Livewire::test(CreateUser::class)
        ->fillForm([
            'name' => $newUserData->name,
            'email' => $newUserData->email,
            'password' => 'password',
            'is_admin' => false,
        ])
        ->call('create')
        ->assertNotified()
        ->assertRedirect();

    $this->assertDatabaseHas(User::class, [
        'name' => $newUserData->name,
        'email' => $newUserData->email,
    ]);
});

test('validates the form data', function (): void {
    $newUserData = User::factory()->make();

    Livewire::test(CreateUser::class)
        ->fillForm([
            'name' => $newUserData->name,
            'email' => $newUserData->email,
        ])
        ->call('create')
        ->assertHasFormErrors()
        ->assertNotNotified()
        ->assertNoRedirect();
});
