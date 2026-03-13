<?php

declare(strict_types=1);

namespace Database\Seeders\Mock;

use App\Models\Workshop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

final class WorkshopsTableSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Workshop::factory()->count(5)->create();
    }
}
