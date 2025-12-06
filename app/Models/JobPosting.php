<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\JobPosting\EmploymentHoursEnum;
use App\Enums\JobPosting\JobPostingStatusEnum;
use App\Enums\JobPosting\JobPostingTypeEnum;
use App\Enums\JobPosting\WorkModeEnum;
use Database\Factories\JobPostingFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperJobPosting
 */
final class JobPosting extends Model
{
    /** @use HasFactory<JobPostingFactory> */
    use HasFactory;

    protected $table = 'job_postings';

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'user_id' => 'integer',
            'type' => JobPostingTypeEnum::class,
            'work_mode' => WorkModeEnum::class,
            'employment_hours' => EmploymentHoursEnum::class,
            'status' => JobPostingStatusEnum::class,
        ];
    }

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'type',
        'work_mode',
        'employment_hours',
        'salary',
        'application_url',
        'status',
    ];

    /**
     * @return BelongsTo<User, covariant JobPosting>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
