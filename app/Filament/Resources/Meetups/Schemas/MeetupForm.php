<?php

declare(strict_types=1);

namespace App\Filament\Resources\Meetups\Schemas;

use App\Enums\Meetup\MeetupTimezoneEnum;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

final class MeetupForm
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
                    ->options(MeetupTimezoneEnum::class)
                    ->required(),
                TextInput::make('location')
                    ->label(__('Location'))
                    ->maxLength(255),
            ]);
    }
}
