<?php

declare(strict_types=1);

namespace App\Filament\Resources\Meetups\Pages;

use App\Filament\Resources\Meetups\MeetupResource;
use Filament\Resources\Pages\CreateRecord;

final class CreateMeetup extends CreateRecord
{
    protected static string $resource = MeetupResource::class;
}
