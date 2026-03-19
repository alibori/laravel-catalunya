<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\CommunityPackage\CommunityPackageStatusEnum;
use App\Observers\CommunityPackageObserver;
use App\Policies\CommunityPackagePolicy;
use Database\Factories\CommunityPackageFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Override;

/**
 * @mixin IdeHelperCommunityPackage
 */
#[ObservedBy(CommunityPackageObserver::class)]
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
        'slug',
        'description',
        'url',
        'status',
    ];

    #[Override]
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * @return BelongsTo<User, covariant CommunityPackage>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
