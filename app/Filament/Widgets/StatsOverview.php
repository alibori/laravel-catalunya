<?php

namespace App\Filament\Widgets;

use App\Models\JobPosting;
use App\Models\User;
use Carbon\Carbon;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Database\Eloquent\Builder;

final class StatsOverview extends StatsOverviewWidget
{
    use InteractsWithPageFilters;

    public function getStats(): array
    {
        $startDate = $this->pageFilters['startDate'] ?? Carbon::now()->startOfMonth();
        $endDate = $this->pageFilters['endDate'] ?? Carbon::now();

        return [
            StatsOverviewWidget\Stat::make(
                label: __('Total users'),
                value: User::query()
                    ->when($startDate, fn (Builder $query) => $query->whereDate('created_at', '>=', $startDate))
                    ->when($endDate, fn (Builder $query) => $query->whereDate('created_at', '<=', $endDate))
                    ->count(),
            )
                ->description(__('Users registered'))
                ->descriptionIcon(Heroicon::UserGroup)
                ->color('success'),

            StatsOverviewWidget\Stat::make(
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
