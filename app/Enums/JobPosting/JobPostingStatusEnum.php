<?php

declare(strict_types=1);

namespace App\Enums\JobPosting;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum JobPostingStatusEnum: string implements HasLabel, HasColor, HasIcon
{
    case Draft = 'draft';
    case Open = 'open';
    case Closed = 'closed';

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return match ($this) {
            self::Draft => __('Draft'),
            self::Open => __('Open'),
            self::Closed => __('Closed'),
        };
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return match ($this) {
            self::Draft => 'gray',
            self::Open => 'success',
            self::Closed => 'danger',
        };
    }

    /**
     * @return string
     */
    public function getIcon(): string
    {
        return match ($this) {
            self::Draft => 'heroicon-m-pencil',
            self::Open => 'heroicon-m-check',
            self::Closed => 'heroicon-m-x-mark',
        };
    }
}
