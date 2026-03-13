<?php

declare(strict_types=1);

namespace App\Filament\Resources\Workshops\Pages;

use App\Filament\Resources\Workshops\WorkshopResource;
use Filament\Resources\Pages\CreateRecord;

final class CreateWorkshop extends CreateRecord
{
    protected static string $resource = WorkshopResource::class;
}
