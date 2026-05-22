<?php

declare(strict_types=1);

namespace App\Filament\Resources\Companies\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class CompanyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(2)
                    ->columnSpanFull()
                    ->schema([
                        Section::make(__('General'))
                            ->schema([
                                TextInput::make('name')
                                    ->label(__('Name'))
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('website')
                                    ->label(__('Website'))
                                    ->url()
                                    ->maxLength(255),
                                RichEditor::make('description')
                                    ->label(__('Description'))
                                    ->required()
                                    ->columnSpanFull(),
                            ]),
                        Section::make(__('Details'))
                            ->schema([
                                TextInput::make('industry')
                                    ->label(__('Industry'))
                                    ->maxLength(255),
                                TextInput::make('location')
                                    ->label(__('Location'))
                                    ->maxLength(255),
                                FileUpload::make('logo_path')
                                    ->label(__('Logo'))
                                    ->image()
                                    ->imageEditor()
                                    ->disk(config('filesystems.default'))
                                    ->directory('companies/logos')
                                    ->columnSpanFull(),
                                Toggle::make('is_visible')
                                    ->label(__('Visible'))
                                    ->default(false),
                            ]),
                    ]),
            ]);
    }
}
