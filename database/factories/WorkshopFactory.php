<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\TimezoneEnum;
use App\Models\Workshop;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Workshop>
 */
final class WorkshopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => 'Laravel Catalunya Workshop',
            'description' => $this->faker->text(),
            'scheduled_at' => $this->faker->dateTimeBetween('+1 week', '+1 month'),
            'timezone' => TimezoneEnum::CET,
            'location' => 'remote',
            'jitsi_url' => $this->faker->url(),
            'jitsi_pass' => $this->faker->word(),
        ];
    }
}
