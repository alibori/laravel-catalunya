<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Actions\CommunityPackages\GetApprovedCommunityPackagesAction;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

final class CommunityPackagesController extends Controller
{
    public function __invoke(GetApprovedCommunityPackagesAction $getApprovedCommunityPackagesAction): View
    {
        return view('community-packages', [
            'packages' => $getApprovedCommunityPackagesAction->execute(),
        ]);
    }
}
