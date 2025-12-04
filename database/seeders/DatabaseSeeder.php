<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Mock\JobPostingsTableSeeder;
use Database\Seeders\Mock\MockUsersTableSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if ( ! app()->isProduction()) {
            $this->call([
                MockUsersTableSeeder::class,
                JobPostingsTableSeeder::class,
            ]);
        }
    }
}
