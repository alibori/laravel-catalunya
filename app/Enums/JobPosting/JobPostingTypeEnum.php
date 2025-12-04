<?php

declare(strict_types=1);

namespace App\Enums\JobPosting;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum JobPostingTypeEnum: string implements HasLabel, HasColor
{
    case Contract = 'contract';
    case Freelance = 'freelance';

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return match ($this) {
            self::Contract => __('Contract'),
            self::Freelance => __('Freelance'),
        };
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return match ($this) {
            self::Contract => 'success',
            self::Freelance => 'warning',
        };
    }
}
