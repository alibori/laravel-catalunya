<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Company>
 */
final class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Company>
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->company();

        return [
            'name' => $name,
            'slug' => Str::slug($name).'-'.$this->faker->unique()->randomNumber(5),
            'logo_path' => null,
            'description' => $this->faker->paragraph(),
            'website' => $this->faker->optional()->url(),
            'industry' => $this->faker->optional()->word(),
            'location' => $this->faker->optional()->city(),
            'is_visible' => false,
        ];
    }

    public function visible(): static
    {
        return $this->state(fn (array $attributes): array => [
            'is_visible' => true,
        ]);
    }

    public function hidden(): static
    {
        return $this->state(fn (array $attributes): array => [
            'is_visible' => false,
        ]);
    }
}
