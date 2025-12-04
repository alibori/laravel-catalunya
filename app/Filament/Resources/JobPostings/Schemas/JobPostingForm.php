<?php

declare(strict_types=1);

namespace App\Filament\Resources\JobPostings\Schemas;

use App\Enums\JobPosting\EmploymentHoursEnum;
use App\Enums\JobPosting\JobPostingStatusEnum;
use App\Enums\JobPosting\JobPostingTypeEnum;
use App\Enums\JobPosting\WorkModeEnum;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

final class JobPostingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                TextInput::make('title')
                    ->required()
                    ->columnSpanFull(),
                RichEditor::make('description')
                    ->required()
                    ->columnSpanFull(),
                Select::make('type')
                    ->options(JobPostingTypeEnum::class)
                    ->required(),
                Select::make('work_mode')
                    ->options(WorkModeEnum::class)
                    ->required(),
                Select::make('employment_hours')
                    ->options(EmploymentHoursEnum::class)
                    ->required(),
                TextInput::make('salary')
                    ->required(),
                TextInput::make('application_url')
                    ->url()
                    ->required(),
                Select::make('status')
                    ->options(JobPostingStatusEnum::class)
                    ->required(),
            ]);
    }
}
