<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\CommunityPackage\CommunityPackageStatusEnum;
use App\Policies\CommunityPackagePolicy;
use Database\Factories\CommunityPackageFactory;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperCommunityPackage
 */
#[UsePolicy(CommunityPackagePolicy::class)]
final class CommunityPackage extends Model
{
    /** @use HasFactory<CommunityPackageFactory> */
    use HasFactory;

    protected $table = 'community_packages';

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'user_id' => 'integer',
            'status' => CommunityPackageStatusEnum::class,
        ];
    }

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'url',
        'status',
    ];

    /**
     * @return BelongsTo<User, covariant CommunityPackage>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
