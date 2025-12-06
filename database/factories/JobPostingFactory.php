<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\JobPosting\EmploymentHoursEnum;
use App\Enums\JobPosting\JobPostingStatusEnum;
use App\Enums\JobPosting\JobPostingTypeEnum;
use App\Enums\JobPosting\WorkModeEnum;
use App\Models\JobPosting;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<JobPosting>
 */
final class JobPostingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<JobPosting>
     */
    protected $model = JobPosting::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->jobTitle(),
            'description' => $this->faker->paragraphs(3, true),
            'type' => $this->faker->randomElement(JobPostingTypeEnum::cases()),
            'work_mode' => $this->faker->randomElement(WorkModeEnum::cases()),
            'employment_hours' => $this->faker->randomElement(EmploymentHoursEnum::cases()),
            'salary' => $this->faker->randomElement(['15000 EUR', '20000 EUR', '30000 EUR', '50000 EUR']),
            'application_url' => $this->faker->url(),
            'status' => $this->faker->randomElement(JobPostingStatusEnum::cases()),
        ];
    }
}
