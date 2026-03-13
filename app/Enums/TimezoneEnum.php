<?php

declare(strict_types=1);

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum TimezoneEnum: string implements HasLabel, HasColor
{
    case CET = 'cet';
    case CEST = 'cest';

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return match ($this) {
            self::CET => __('CET'),
            self::CEST => __('CEST'),
        };
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return match ($this) {
            self::CET => 'success',
            self::CEST => 'info',
        };
    }
}
