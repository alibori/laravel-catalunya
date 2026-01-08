<?php

namespace App\Filament\App\Pages;

use Filament\Forms\Components\DatePicker;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

final class Dashboard extends BaseDashboard
{
    use HasFiltersForm;

    public function filtersForm(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        DatePicker::make('startDate')
                            ->native(false)
                            ->label(__('Start Date'))
                            ->placeholder('dd/mm/yyyy')
                            ->closeOnDateSelection()
                            ->displayFormat('d/m/Y')
                            ->locale(config('app.locale'))
                            ->prefixIcon(Heroicon::Calendar)
                            ->minDate(now()->subYears(5))
                            ->maxDate(now()),
                        DatePicker::make('endDate')
                            ->native(false)
                            ->label(__('End Date'))
                            ->placeholder('dd/mm/yyyy')
                            ->closeOnDateSelection()
                            ->displayFormat('d/m/Y')
                            ->locale(config('app.locale'))
                            ->prefixIcon(Heroicon::Calendar)
                            ->minDate(now()->subYears(5))
                            ->maxDate(now()),
                    ])
                    ->columns(3)
                    ->columnSpanFull(),
            ]);
    }
}
