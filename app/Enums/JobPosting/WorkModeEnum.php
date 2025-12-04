<?php

declare(strict_types=1);

namespace App\Enums\JobPosting;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum WorkModeEnum: string implements HasLabel, HasColor
{
    case Remote = 'remote';
    case OnSite = 'on_site';
    case Hybrid = 'hybrid';

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return match ($this) {
            self::Remote => __('Remote'),
            self::OnSite => __('On-site'),
            self::Hybrid => __('Hybrid'),
        };
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return match ($this) {
            self::Remote => 'success',
            self::OnSite => 'warning',
            self::Hybrid => 'info',
        };
    }
}
