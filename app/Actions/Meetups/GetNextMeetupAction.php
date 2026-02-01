<?php

declare(strict_types=1);

namespace App\Actions\Meetups;

use App\Models\Meetup;

final readonly class GetNextMeetupAction
{
    public function execute(): ?Meetup
    {
        return Meetup::query()
            ->where('scheduled_at', '>=', now())
            ->oldest('scheduled_at')
            ->first();
    }
}
