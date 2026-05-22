<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Actions\Companies\GetVisibleCompaniesAction;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

final class CompaniesController extends Controller
{
    public function __invoke(GetVisibleCompaniesAction $getVisibleCompaniesAction): View
    {
        return view('companies', [
            'companies' => $getVisibleCompaniesAction->execute(),
        ]);
    }
}
