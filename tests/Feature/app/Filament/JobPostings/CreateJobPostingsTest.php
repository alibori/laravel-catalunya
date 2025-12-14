<?php

declare(strict_types=1);

use App\Filament\Resources\JobPostings\Pages\CreateJobPosting;
use App\Models\JobPosting;
use App\Models\User;

beforeEach(function (): void {
    $admin = User::factory()->create(['is_admin' => true]);

    $this->actingAs($admin);
});

test('can load the page', function (): void {
    Livewire::test(CreateJobPosting::class)
        ->assertOk();
});

test('can create a job posting', function (): void {
    $newJobPostingData = JobPosting::factory()->make();

    Livewire::test(CreateJobPosting::class)
        ->fillForm([
            'user_id' => $newJobPostingData->user_id,
            'title' => $newJobPostingData->title,
            'description' => $newJobPostingData->description,
            'type' => $newJobPostingData->type,
            'work_mode' => $newJobPostingData->work_mode,
            'employment_hours' => $newJobPostingData->employment_hours,
            'salary' => $newJobPostingData->salary,
            'application_url' => $newJobPostingData->application_url,
            'status' => $newJobPostingData->status,
        ])
        ->call('create')
        ->assertNotified()
        ->assertRedirect();

    $this->assertDatabaseHas(JobPosting::class, [
        'user_id' => $newJobPostingData->user_id,
        'title' => $newJobPostingData->title,
        'type' => $newJobPostingData->type,
        'work_mode' => $newJobPostingData->work_mode,
        'employment_hours' => $newJobPostingData->employment_hours,
        'salary' => $newJobPostingData->salary,
        'application_url' => $newJobPostingData->application_url,
        'status' => $newJobPostingData->status,
    ]);
});

test('validates the form data', function (): void {
    $newJobPostingData = JobPosting::factory()->make();

    Livewire::test(CreateJobPosting::class)
        ->fillForm([
            'title' => $newJobPostingData->title,
        ])
        ->call('create')
        ->assertHasFormErrors()
        ->assertNotNotified()
        ->assertNoRedirect();
});
