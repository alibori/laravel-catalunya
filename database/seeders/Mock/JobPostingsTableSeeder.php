<?php

declare(strict_types=1);

namespace Database\Seeders\Mock;

use App\Models\JobPosting;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

final class JobPostingsTableSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::query()
            ->where('is_admin', false)
            ->get();

        $users->each(function ($user): void {
            JobPosting::factory()
                ->count(3)
                ->for($user)
                ->create();
        });
    }
}
