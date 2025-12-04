<?php

declare(strict_types=1);

namespace App\Filament\Resources\Sponsors\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

final class SponsorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('website')
                    ->url(),
                FileUpload::make('logo_path')
                    ->label('Logo')
                    ->image()
                    ->imageEditor()
                    ->disk(config('filesystems.default'))
                    ->directory('sponsors/logos')
                    ->columnSpanFull(),
            ]);
    }
}
