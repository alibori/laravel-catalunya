<?php

declare(strict_types=1);

namespace App\Filament\Resources\Meetups;

use App\Filament\Resources\Meetups\Pages\CreateMeetup;
use App\Filament\Resources\Meetups\Pages\EditMeetup;
use App\Filament\Resources\Meetups\Pages\ListMeetups;
use App\Filament\Resources\Meetups\Schemas\MeetupForm;
use App\Filament\Resources\Meetups\Tables\MeetupsTable;
use App\Models\Meetup;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Override;

final class MeetupResource extends Resource
{
    protected static ?string $model = Meetup::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::CalendarDays;

    protected static ?int $navigationSort = 5;

    protected static ?string $recordTitleAttribute = 'title';

    public static function getModelLabel(): string
    {
        return __('Meetup');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Meetups');
    }

    #[Override]
    public static function form(Schema $schema): Schema
    {
        return MeetupForm::configure($schema);
    }

    #[Override]
    public static function table(Table $table): Table
    {
        return MeetupsTable::configure($table);
    }

    #[Override]
    public static function getRelations(): array
    {
        return [

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMeetups::route('/'),
            'create' => CreateMeetup::route('/create'),
            'edit' => EditMeetup::route('/{record}/edit'),
        ];
    }
}
