<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\SponsorFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
