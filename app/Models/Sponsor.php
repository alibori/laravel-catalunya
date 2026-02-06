<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\SponsorFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * @mixin IdeHelperSponsor
 */
final class Sponsor extends Model
{
    /** @use HasFactory<SponsorFactory> */
    use HasFactory;

    protected $table = 'sponsors';

    protected $fillable = [
        'name',
        'website',
        'logo_path',
    ];

    /**
     * @return Attribute<?string, never>
     */
    protected function logoUrl(): Attribute
    {
        return Attribute::make(
            get: fn (): ?string => $this->logo_path
                ? Storage::url($this->logo_path)
                : null,
        );
    }
}
