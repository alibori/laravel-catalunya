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
use Illuminate\Support\Facades\Auth;

final class JobPostingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required()
                    ->label(__('User'))
                    ->default(Auth::user()?->id)
                    ->hidden( ! Auth::user()?->is_admin),
                TextInput::make('title')
                    ->label(__('Title'))
                    ->required()
                    ->columnSpanFull(),
                RichEditor::make('description')
                    ->label(__('Description'))
                    ->required()
                    ->columnSpanFull(),
                Select::make('type')
                    ->label(__('Type'))
                    ->options(JobPostingTypeEnum::class)
                    ->required(),
                Select::make('work_mode')
                    ->label(__('Work Mode'))
                    ->options(WorkModeEnum::class)
                    ->required(),
                Select::make('employment_hours')
                    ->label(__('Employment Hours'))
                    ->options(EmploymentHoursEnum::class)
                    ->required(),
                TextInput::make('salary')
                    ->label(__('Salary'))
                    ->required(),
                TextInput::make('application_url')
                    ->label(__('Application URL'))
                    ->url()
                    ->nullable(),
                Select::make('status')
                    ->label(__('Status'))
                    ->options(JobPostingStatusEnum::class)
                    ->required(),
            ]);
    }
}
