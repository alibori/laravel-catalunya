<?php

declare(strict_types=1);

namespace App\Filament\Resources\Sponsors;

use App\Filament\Resources\Sponsors\Pages\CreateSponsor;
use App\Filament\Resources\Sponsors\Pages\EditSponsor;
use App\Filament\Resources\Sponsors\Pages\ListSponsors;
use App\Filament\Resources\Sponsors\Schemas\SponsorForm;
use App\Filament\Resources\Sponsors\Tables\SponsorsTable;
use App\Models\Sponsor;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Override;

final class SponsorResource extends Resource
{
    protected static ?string $model = Sponsor::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::CurrencyEuro;

    protected static ?string $recordTitleAttribute = 'name';

    public static function getNavigationGroup(): ?string
    {
        return __('Sponsorship');
    }

    public static function getModelLabel(): string
    {
        return __('Sponsor');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Sponsors');
    }

    #[Override]
    public static function form(Schema $schema): Schema
    {
        return SponsorForm::configure($schema);
    }

    #[Override]
    public static function table(Table $table): Table
    {
        return SponsorsTable::configure($table);
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
            'index' => ListSponsors::route('/'),
            'create' => CreateSponsor::route('/create'),
            'edit' => EditSponsor::route('/{record}/edit'),
        ];
    }
}
