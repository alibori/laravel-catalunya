<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\CommunityPackage\CommunityPackageStatusEnum;
use App\Models\CommunityPackage;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<CommunityPackage>
 */
final class CommunityPackageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<CommunityPackage>
     */
    protected $model = CommunityPackage::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->words(3, true);

        return [
            'user_id' => User::factory(),
            'name' => $name,
            'slug' => Str::slug($name).'-'.$this->faker->unique()->randomNumber(5),
            'description' => $this->faker->paragraph(),
            'url' => $this->faker->url(),
            'status' => $this->faker->randomElement(CommunityPackageStatusEnum::cases()),
        ];
    }

    public function pending(): static
    {
        return $this->state(fn (array $attributes): array => [
            'status' => CommunityPackageStatusEnum::Pending,
        ]);
    }

    public function approved(): static
    {
        return $this->state(fn (array $attributes): array => [
            'status' => CommunityPackageStatusEnum::Approved,
        ]);
    }

    public function rejected(): static
    {
        return $this->state(fn (array $attributes): array => [
            'status' => CommunityPackageStatusEnum::Rejected,
        ]);
    }
}
