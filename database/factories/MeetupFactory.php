<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\Meetup\MeetupTimezoneEnum;
use App\Models\Meetup;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Meetup>
 */
final class MeetupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => 'Laravel Catalunya Meetup',
            'description' => $this->faker->text(),
            'scheduled_at' => $this->faker->dateTimeBetween('+1 week', '+1 month'),
            'timezone' => MeetupTimezoneEnum::CET,
            'location' => 'remote',
        ];
    }
}
