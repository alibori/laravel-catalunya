<?php

declare(strict_types=1);

namespace App\Events;

use App\Models\JobPosting;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

final class JobPostingShoutOutDoneEvent
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(public JobPosting $jobPosting)
    {
    }
}
