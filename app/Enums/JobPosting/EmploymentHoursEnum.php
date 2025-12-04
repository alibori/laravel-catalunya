<?php

declare(strict_types=1);

namespace App\Enums\JobPosting;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum EmploymentHoursEnum: string implements HasLabel, HasColor
{
    case FullTime = 'full_time';
    case PartTime = 'part_time';

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return match ($this) {
            self::FullTime => __('Full-time'),
            self::PartTime => __('Part-time'),
        };
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return match ($this) {
            self::FullTime => 'success',
            self::PartTime => 'warning',
        };
    }
}
