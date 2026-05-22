<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Actions\Companies\GetVisibleCompanyBySlugAction;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

final class ShowCompanyController extends Controller
{
    public function __invoke(string $slug, GetVisibleCompanyBySlugAction $action): View
    {
        return view('company-show', [
            'company' => $action->execute($slug),
        ]);
    }
}
