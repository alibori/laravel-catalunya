<?php

declare(strict_types=1);

namespace App\Filament\Resources\CommunityPackages\Pages;

use App\Filament\Resources\CommunityPackages\CommunityPackageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

final class ListCommunityPackages extends ListRecords
{
    protected static string $resource = CommunityPackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
