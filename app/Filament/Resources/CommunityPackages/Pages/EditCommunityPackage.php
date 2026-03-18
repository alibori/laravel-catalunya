<?php

declare(strict_types=1);

namespace App\Filament\Resources\CommunityPackages\Pages;

use App\Filament\Resources\CommunityPackages\CommunityPackageResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

final class EditCommunityPackage extends EditRecord
{
    protected static string $resource = CommunityPackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
