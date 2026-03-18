<?php

declare(strict_types=1);

namespace App\Filament\Resources\CommunityPackages\Pages;

use App\Enums\CommunityPackage\CommunityPackageStatusEnum;
use App\Filament\Resources\CommunityPackages\CommunityPackageResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;
use Override;

final class CreateCommunityPackage extends CreateRecord
{
    protected static string $resource = CommunityPackageResource::class;

    /**
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    #[Override]
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if ( ! Auth::user()?->is_admin) {
            $data['user_id'] = Auth::id();
            $data['status'] = CommunityPackageStatusEnum::Pending;
        }

        return $data;
    }
}
