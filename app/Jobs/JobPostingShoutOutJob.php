<?php

declare(strict_types=1);

namespace App\Jobs;

use App\Actions\TelegramBot\SendJobPostingToChannelAction;
use App\Events\JobPostingShoutOutDoneEvent;
use App\Models\JobPosting;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use Throwable;

final class JobPostingShoutOutJob implements ShouldQueue
{
    use Queueable;

    public int $tries = 2;
    public int $backoff = 60;
    private string $logChannel = 'job-posting-shout-out';

    /**
     * Create a new job instance.
     */
    public function __construct(public int $jobPostingId)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(SendJobPostingToChannelAction $action): void
    {
        try {
            Log::channel($this->logChannel)->info('Attempt '.$this->attempts().'/'.$this->tries.' job posting shout-out for job posting #'.$this->jobPostingId);

            $jobPosting = JobPosting::findOrFail($this->jobPostingId);

            $action->execute($jobPosting);

            JobPostingShoutOutDoneEvent::dispatch($jobPosting);

            Log::channel($this->logChannel)->info('Job posting shout-out for job posting #'.$this->jobPostingId.' finished successfully');
        } catch (Throwable $exception) {
            if ($exception instanceof ModelNotFoundException) {
                Log::channel($this->logChannel)->error('Job failed by exception: '.$exception->getMessage());

                $this->fail($exception->getMessage());
            }

            if ($this->attempts() < $this->tries) {
                Log::channel($this->logChannel)->error('Job failed by exception: '.$exception->getMessage());

                Log::channel($this->logChannel)->info('It will be executed again in '.$this->backoff.' seconds');

                $this->release($this->backoff);
            } else {
                Log::channel($this->logChannel)->error('Job failed by exception: '.$exception->getMessage());
            }
        }
    }
}
