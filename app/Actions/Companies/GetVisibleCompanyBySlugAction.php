<?php

declare(strict_types=1);

namespace App\Actions\Companies;

use App\Models\Company;

final readonly class GetVisibleCompanyBySlugAction
{
    public function execute(string $slug): Company
    {
        return Company::query()
            ->where('is_visible', true)
            ->where('slug', $slug)
            ->firstOrFail();
    }
}
