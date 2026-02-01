<?php

declare(strict_types=1);

namespace Database\Seeders\Mock;

use App\Models\Meetup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

final class MeetupsTableSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Meetup::factory()->count(5)->create();
    }
}
