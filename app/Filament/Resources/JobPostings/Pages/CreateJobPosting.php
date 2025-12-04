<?php

declare(strict_types=1);

namespace App\Filament\Resources\JobPostings\Pages;

use App\Filament\Resources\JobPostings\JobPostingResource;
use Filament\Resources\Pages\CreateRecord;

final class CreateJobPosting extends CreateRecord
{
    protected static string $resource = JobPostingResource::class;
}
