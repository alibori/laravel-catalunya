<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Actions\Meetups\GetNextMeetupAction;
use App\Http\Controllers\Controller;
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
