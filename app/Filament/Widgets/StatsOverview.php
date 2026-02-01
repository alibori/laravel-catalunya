<?php

declare(strict_types=1);

namespace App\Filament\Widgets;

use App\Models\JobPosting;
use App\Models\User;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Database\Eloquent\Builder;
use Override;

final class StatsOverview extends StatsOverviewWidget
{
    use InteractsWithPageFilters;

    #[Override]
    public function getStats(): array
    {
        $startDate = $this->pageFilters['startDate'] ?? \Illuminate\Support\Facades\Date::now()->startOfMonth();
        $endDate = $this->pageFilters['endDate'] ?? \Illuminate\Support\Facades\Date::now();

        return [
            Stat::make(
                label: __('Total users'),
                value: User::query()
                    ->when($startDate, fn (Builder $query) => $query->whereDate('created_at', '>=', $startDate))
                    ->when($endDate, fn (Builder $query) => $query->whereDate('created_at', '<=', $endDate))
                    ->count(),
            )
                ->description(__('Users registered'))
                ->descriptionIcon(Heroicon::UserGroup)
                ->color('success'),

            Stat::make(
                label: __('Total job postings'),
                value: JobPosting::query()
                    ->when($startDate, fn (Builder $query) => $query->whereDate('created_at', '>=', $startDate))
                    ->when($endDate, fn (Builder $query) => $query->whereDate('created_at', '<=', $endDate))
                    ->count(),
            )
                ->description(__('Job postings created'))
                ->descriptionIcon(Heroicon::Briefcase)
                ->color('info'),
        ];
    }
}
