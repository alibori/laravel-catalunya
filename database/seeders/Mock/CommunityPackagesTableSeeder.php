<?php

declare(strict_types=1);

namespace Database\Seeders\Mock;

use App\Models\CommunityPackage;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

final class CommunityPackagesTableSeeder extends Seeder
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
            CommunityPackage::factory()
                ->count(3)
                ->for($user)
                ->create();
        });
    }
}
