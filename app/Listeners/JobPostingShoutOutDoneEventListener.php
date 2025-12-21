<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\JobPostingShoutOutDoneEvent;
use Filament\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

final class JobPostingShoutOutDoneEventListener implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     */
    public function handle(JobPostingShoutOutDoneEvent $event): void
    {
        $event->jobPosting->loadMissing('user');

        $event->jobPosting->user->notify(
            Notification::make()
                ->title(__('Job Posting shared successfully!'))
                ->body(__('Job Posting').': '.$event->jobPosting->title)
                ->success()
                ->toDatabase()
        );
    }
}
