<?php

declare(strict_types=1);

namespace App\Filament\Resources\Meetups\Pages;

use App\Filament\Resources\Meetups\MeetupResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

final class ListMeetups extends ListRecords
{
    protected static string $resource = MeetupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
