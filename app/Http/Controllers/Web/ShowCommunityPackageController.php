<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Actions\CommunityPackages\GetApprovedCommunityPackageBySlugAction;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

final class ShowCommunityPackageController extends Controller
{
    public function __invoke(string $slug, GetApprovedCommunityPackageBySlugAction $action): View
    {
        return view('community-package-show', [
            'package' => $action->execute($slug),
        ]);
    }
}
