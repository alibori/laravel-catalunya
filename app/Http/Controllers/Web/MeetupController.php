<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Actions\Meetups\GetNextMeetupAction;
use App\Actions\Meetups\GetPastMeetupsAction;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

final class MeetupController extends Controller
{
    public function __invoke(
        GetNextMeetupAction $getNextMeetupAction,
        GetPastMeetupsAction $getPastMeetupsAction
    ): View {
        return view('meetups', [
            'meetup' => $getNextMeetupAction->execute(),
            'pastMeetups' => $getPastMeetupsAction->execute(),
        ]);
    }
}
