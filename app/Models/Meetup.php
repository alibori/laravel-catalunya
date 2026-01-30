<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\Meetup\MeetupTimezoneEnum;
use Database\Factories\MeetupFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperMeetup
 */
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
            'timezone' => MeetupTimezoneEnum::class,
        ];
    }

    protected $fillable = [
        'title',
        'description',
        'scheduled_at',
        'timezone',
        'location',
    ];
}
