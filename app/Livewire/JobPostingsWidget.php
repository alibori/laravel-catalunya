<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\JobPosting;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Override;

final class JobPostingsWidget extends ChartWidget
{
    protected ?string $pollingInterval = null;

    protected ?string $maxHeight = '350px';

    #[Override]
    public function getHeading(): string
    {
        return __('Job Postings');
    }

    protected function getData(): array
    {
        $data = Trend::model(JobPosting::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => __('Job Postings'),
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
