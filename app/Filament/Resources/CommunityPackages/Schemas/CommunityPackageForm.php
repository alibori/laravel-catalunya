<?php

declare(strict_types=1);

namespace App\Filament\Resources\CommunityPackages\Schemas;

use App\Enums\CommunityPackage\CommunityPackageStatusEnum;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

final class CommunityPackageForm
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
                TextInput::make('name')
                    ->label(__('Package Name'))
                    ->required()
                    ->columnSpanFull(),
                RichEditor::make('description')
                    ->label(__('Description'))
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('url')
                    ->label(__('Package URL'))
                    ->url()
                    ->required()
                    ->columnSpanFull(),
                Select::make('status')
                    ->label(__('Status'))
                    ->options(CommunityPackageStatusEnum::class)
                    ->required()
                    ->default(CommunityPackageStatusEnum::Pending)
                    ->hidden( ! Auth::user()?->is_admin),
            ]);
    }
}
