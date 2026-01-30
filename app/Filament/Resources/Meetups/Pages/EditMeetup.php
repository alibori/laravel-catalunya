<?php

declare(strict_types=1);

namespace App\Filament\Resources\Meetups\Pages;

use App\Filament\Resources\Meetups\MeetupResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

final class EditMeetup extends EditRecord
{
    protected static string $resource = MeetupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
