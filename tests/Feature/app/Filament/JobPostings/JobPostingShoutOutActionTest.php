<?php

declare(strict_types=1);

use App\Filament\Resources\JobPostings\Pages\ListJobPostings;
use App\Jobs\JobPostingShoutOutJob;
use App\Models\JobPosting;
use App\Models\User;
use Filament\Actions\Testing\TestAction;

beforeEach(function (): void {
    $admin = User::factory()->create(['is_admin' => true]);

    $this->actingAs($admin);
});

test('can shout out a job posting', function (): void {
    $jobPosting = JobPosting::factory()->create([
        'telegram_sync' => false,
    ]);

    Livewire::test(ListJobPostings::class)
        ->assertActionExists('shoutout')
        ->callAction(TestAction::make('shoutout')->table($jobPosting))
        ->assertActionHalted('shoutout')
        ->assertDispatched(JobPostingShoutOutJob::class);

    expect($jobPosting->refresh())
        ->telegram_sync->toBeTrue();
})->skip();
