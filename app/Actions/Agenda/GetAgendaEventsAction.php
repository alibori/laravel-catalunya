<?php

declare(strict_types=1);

namespace App\Actions\Agenda;

use App\Models\Meetup;
use App\Models\Workshop;
use Illuminate\Support\Collection;

final readonly class GetAgendaEventsAction
{
    /**
     * @return Collection<int, Meetup|Workshop>
     */
    public function execute(): Collection
    {
        $meetups = Meetup::query()->get();
        $workshops = Workshop::query()->get();

        return $meetups->concat($workshops)
            ->sortByDesc('scheduled_at')
            ->values();
    }
}
