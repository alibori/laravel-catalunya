<?php

declare(strict_types=1);

namespace App\Filament\Resources\CommunityPackages;

use App\Filament\Resources\CommunityPackages\Pages\CreateCommunityPackage;
use App\Filament\Resources\CommunityPackages\Pages\EditCommunityPackage;
use App\Filament\Resources\CommunityPackages\Pages\ListCommunityPackages;
use App\Filament\Resources\CommunityPackages\Schemas\CommunityPackageForm;
use App\Filament\Resources\CommunityPackages\Tables\CommunityPackagesTable;
use App\Models\CommunityPackage;
use App\Models\User;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Override;

final class CommunityPackageResource extends Resource
{
    protected static ?string $model = CommunityPackage::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::CubeTransparent;

    protected static ?int $navigationSort = 4;

    protected static ?string $recordTitleAttribute = 'name';

    public static function getModelLabel(): string
    {
        return __('Community Package');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Community Packages');
    }

    #[Override]
    public static function getEloquentQuery(): Builder
    {
        if (Auth::user() instanceof User && Auth::user()->is_admin) {
            return parent::getEloquentQuery();
        }

        return parent::getEloquentQuery()->where('user_id', Auth::user()->id);
    }

    #[Override]
    public static function form(Schema $schema): Schema
    {
        return CommunityPackageForm::configure($schema);
    }

    #[Override]
    public static function table(Table $table): Table
    {
        return CommunityPackagesTable::configure($table);
    }

    #[Override]
    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCommunityPackages::route('/'),
            'create' => CreateCommunityPackage::route('/create'),
            'edit' => EditCommunityPackage::route('/{record}/edit'),
        ];
    }
}
