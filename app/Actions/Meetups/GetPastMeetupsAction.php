<?php

declare(strict_types=1);

namespace App\Actions\Meetups;

use App\Models\Meetup;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final readonly class GetPastMeetupsAction
{
    public function execute(int $perPage = 12): LengthAwarePaginator
    {
        return Meetup::query()
            ->where('scheduled_at', '<', now())
            ->latest('scheduled_at')
            ->paginate($perPage);
    }
}
