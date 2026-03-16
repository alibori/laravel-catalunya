<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Actions\Agenda\GetAgendaEventsAction;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

final class AgendaController extends Controller
{
    public function __invoke(GetAgendaEventsAction $getAgendaEventsAction): View
    {
        return view('agenda', [
            'events' => $getAgendaEventsAction->execute(),
        ]);
    }
}
