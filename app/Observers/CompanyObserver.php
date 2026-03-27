<?php

declare(strict_types=1);

namespace App\Observers;

use App\Models\Company;
use Illuminate\Support\Str;

final class CompanyObserver
{
    public function creating(Company $company): void
    {
        if (empty($company->slug)) {
            $company->slug = Str::slug($company->name);
        }
    }
}
