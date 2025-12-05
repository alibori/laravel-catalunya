<?php

declare(strict_types=1);

use App\Filament\Resources\JobPostings\Pages\ListJobPostings;
use App\Models\JobPosting;
use App\Models\User;

beforeEach(function (): void {
    $admin = User::factory()->create(['is_admin' => true]);

    $this->actingAs($admin);
});

it('can load the page', function (): void {
    $jobPostings = JobPosting::factory()->count(5)->create();

    Livewire::test(ListJobPostings::class)
        ->assertOk()
        ->assertCanSeeTableRecords($jobPostings);
});
