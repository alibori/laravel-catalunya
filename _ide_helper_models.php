<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $description
 * @property string $url
 * @property \App\Enums\CommunityPackage\CommunityPackageStatusEnum $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $slug
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\CommunityPackageFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CommunityPackage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CommunityPackage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CommunityPackage query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CommunityPackage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CommunityPackage whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CommunityPackage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CommunityPackage whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CommunityPackage whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CommunityPackage whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CommunityPackage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CommunityPackage whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CommunityPackage whereUserId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	final class IdeHelperCommunityPackage {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $description
 * @property \App\Enums\JobPosting\JobPostingTypeEnum $type
 * @property \App\Enums\JobPosting\WorkModeEnum $work_mode
 * @property \App\Enums\JobPosting\EmploymentHoursEnum $employment_hours
 * @property string $salary
 * @property string|null $application_url
 * @property \App\Enums\JobPosting\JobPostingStatusEnum $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property bool $telegram_sync
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\JobPostingFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobPosting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobPosting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobPosting query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobPosting whereApplicationUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobPosting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobPosting whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobPosting whereEmploymentHours($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobPosting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobPosting whereSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobPosting whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobPosting whereTelegramSync($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobPosting whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobPosting whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobPosting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobPosting whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobPosting whereWorkMode($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	final class IdeHelperJobPosting {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property \Illuminate\Support\Carbon $scheduled_at
 * @property \App\Enums\TimezoneEnum $timezone
 * @property string $location
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $event_type
 * @method static \Database\Factories\MeetupFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Meetup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Meetup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Meetup query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Meetup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Meetup whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Meetup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Meetup whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Meetup whereScheduledAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Meetup whereTimezone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Meetup whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Meetup whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	final class IdeHelperMeetup {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string|null $website
 * @property string|null $logo_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string|null $logo_url
 * @method static \Database\Factories\SponsorFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sponsor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sponsor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sponsor query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sponsor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sponsor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sponsor whereLogoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sponsor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sponsor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sponsor whereWebsite($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	final class IdeHelperSponsor {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property bool $is_admin
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CommunityPackage> $communityPackages
 * @property-read int|null $community_packages_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\JobPosting> $jobPostings
 * @property-read int|null $job_postings_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereIsAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	final class IdeHelperUser {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property \Illuminate\Support\Carbon $scheduled_at
 * @property \App\Enums\TimezoneEnum $timezone
 * @property string $location
 * @property string|null $jitsi_url
 * @property string|null $jitsi_pass
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $event_type
 * @method static \Database\Factories\WorkshopFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Workshop newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Workshop newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Workshop query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Workshop whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Workshop whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Workshop whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Workshop whereJitsiPass($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Workshop whereJitsiUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Workshop whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Workshop whereScheduledAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Workshop whereTimezone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Workshop whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Workshop whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	final class IdeHelperWorkshop {}
}

