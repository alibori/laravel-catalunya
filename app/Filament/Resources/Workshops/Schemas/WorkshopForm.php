<?php

declare(strict_types=1);

namespace App\Filament\Resources\Workshops\Schemas;

use App\Enums\TimezoneEnum;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

final class WorkshopForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label(__('Title'))
                    ->required()
                    ->maxLength(255),
                RichEditor::make('description')
                    ->label(__('Description'))
                    ->required()
                    ->columnSpanFull(),
                DateTimePicker::make('scheduled_at')
                    ->label(__('Scheduled at'))
                    ->required(),
                Select::make('timezone')
                    ->label(__('Timezone'))
                    ->options(TimezoneEnum::class)
                    ->required(),
                TextInput::make('location')
                    ->label(__('Location'))
                    ->maxLength(255),
                TextInput::make('jitsi_url')
                    ->label(__('Jitsi URL'))
                    ->url()
                    ->required()
                    ->maxLength(255),
                TextInput::make('jitsi_pass')
                    ->label(__('Jitsi Password'))
                    ->required()
                    ->maxLength(255),
            ]);
    }
}
