<?php

declare(strict_types=1);

namespace App\Actions\Companies;

use App\Models\Company;
use Illuminate\Pagination\LengthAwarePaginator;

final readonly class GetVisibleCompaniesAction
{
    /**
     * @return LengthAwarePaginator<int, Company>
     */
    public function execute(int $perPage = 12): LengthAwarePaginator
    {
        return Company::query()
            ->where('is_visible', true)
            ->latest()
            ->paginate($perPage);
    }
}
