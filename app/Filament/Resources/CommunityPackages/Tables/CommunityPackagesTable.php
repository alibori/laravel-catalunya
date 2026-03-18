<?php

declare(strict_types=1);

namespace App\Filament\Resources\CommunityPackages\Tables;

use App\Actions\CommunityPackages\ApproveCommunityPackageAction;
use App\Actions\CommunityPackages\RejectCommunityPackageAction;
use App\Enums\CommunityPackage\CommunityPackageStatusEnum;
use App\Models\CommunityPackage;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

final class CommunityPackagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label(__('Submitted by'))
                    ->searchable()
                    ->visible(fn (): bool => Auth::user()?->is_admin ?? false),
                TextColumn::make('name')
                    ->label(__('Package Name'))
                    ->searchable(),
                TextColumn::make('url')
                    ->label(__('URL'))
                    ->limit(30)
                    ->url(fn (CommunityPackage $record): string => $record->url, shouldOpenInNewTab: true),
                TextColumn::make('status')
                    ->label(__('Status'))
                    ->badge()
                    ->searchable()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label(__('Created At'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->recordActions([
                EditAction::make(),
                Action::make('approve')
                    ->label(__('Approve'))
                    ->icon('heroicon-o-check-circle')
                    ->iconButton()
                    ->color('success')
                    ->requiresConfirmation()
                    ->visible(fn (CommunityPackage $record): bool => (Auth::user()?->is_admin ?? false)
                        && CommunityPackageStatusEnum::Pending === $record->status)
                    ->action(fn (CommunityPackage $record) => resolve(ApproveCommunityPackageAction::class)->execute($record)),
                Action::make('reject')
                    ->label(__('Reject'))
                    ->icon('heroicon-o-x-circle')
                    ->iconButton()
                    ->color('danger')
                    ->requiresConfirmation()
                    ->visible(fn (CommunityPackage $record): bool => (Auth::user()?->is_admin ?? false)
                        && CommunityPackageStatusEnum::Pending === $record->status)
                    ->action(fn (CommunityPackage $record) => resolve(RejectCommunityPackageAction::class)->execute($record)),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
