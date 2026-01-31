<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Meetups\GetNextMeetupAction;
use Illuminate\Contracts\View\View;

final class MeetupController extends Controller
{
    public function __invoke(GetNextMeetupAction $action): View
    {
        return view('meetups', [
            'meetup' => $action->execute(),
        ]);
    }
}
