<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Sponsor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Sponsor>
 */
final class SponsorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Sponsor>
     */
    protected $model = Sponsor::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'website' => $this->faker->optional()->url(),
            'logo_path' => null,
        ];
    }
}
