<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\TimezoneEnum;
use App\Policies\WorkshopPolicy;
use Database\Factories\WorkshopFactory;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperWorkshop
 */
#[UsePolicy(WorkshopPolicy::class)]
final class Workshop extends Model
{
    /** @use HasFactory<WorkshopFactory> */
    use HasFactory;

    protected $table = 'workshops';

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'scheduled_at' => 'datetime',
            'timezone' => TimezoneEnum::class,
        ];
    }

    protected $fillable = [
        'title',
        'description',
        'scheduled_at',
        'timezone',
        'location',
        'jitsi_url',
        'jitsi_pass',
    ];
}
