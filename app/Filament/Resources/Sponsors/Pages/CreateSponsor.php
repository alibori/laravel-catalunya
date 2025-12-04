<?php

declare(strict_types=1);

namespace App\Filament\Resources\Sponsors\Pages;

use App\Filament\Resources\Sponsors\SponsorResource;
use Filament\Resources\Pages\CreateRecord;

final class CreateSponsor extends CreateRecord
{
    protected static string $resource = SponsorResource::class;
}
