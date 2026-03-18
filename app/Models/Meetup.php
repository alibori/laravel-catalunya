<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\TimezoneEnum;
use App\Policies\MeetupPolicy;
use Database\Factories\MeetupFactory;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperMeetup
 */
#[UsePolicy(MeetupPolicy::class)]
final class Meetup extends Model
{
    /** @use HasFactory<MeetupFactory> */
    use HasFactory;

    protected $table = 'meetups';

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

    /**
     * @return Attribute<string, null>
     */
    protected function eventType(): Attribute
    {
        return Attribute::make(get: fn () => 'meetup');
    }

    protected $fillable = [
        'title',
        'description',
        'scheduled_at',
        'timezone',
        'location',
    ];
}
