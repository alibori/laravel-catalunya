<?php

declare(strict_types=1);

namespace App\Filament\Resources\JobPostings\Tables;

use App\Jobs\JobPostingShoutOutJob;
use App\Models\JobPosting;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Support\Enums\Alignment;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

final class JobPostingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label(__('User'))
                    ->searchable(),
                TextColumn::make('title')
                    ->label(__('Title'))
                    ->searchable(),
                TextColumn::make('type')
                    ->label(__('Type'))
                    ->badge()
                    ->searchable()
                    ->sortable(),
                TextColumn::make('work_mode')
                    ->label(__('Work Mode'))
                    ->badge()
                    ->searchable()
                    ->sortable(),
                TextColumn::make('employment_hours')
                    ->label(__('Employment Hours'))
                    ->badge()
                    ->searchable()
                    ->sortable(),
                TextColumn::make('status')
                    ->label(__('Status'))
                    ->badge()
                    ->searchable()
                    ->sortable(),
                IconColumn::make('telegram_sync')
                    ->label(__('Sent to Telegram'))
                    ->sortable()
                    ->alignment(Alignment::Center)
                    ->visible(Auth::user()?->is_admin ?? false),
                TextColumn::make('created_at')
                    ->label(__('Created At'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label(__('Updated At'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([

            ])
            ->recordActions([
                EditAction::make(),
                Action::make('shoutout')
                    ->icon('heroicon-o-megaphone')
                    ->iconButton()
                    ->color('info')
                    ->requiresConfirmation()
                    ->visible(Auth::user()?->is_admin ?? false)
                    ->action(fn (JobPosting $record) => JobPostingShoutOutJob::dispatch($record->id)),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
