<?php

declare(strict_types=1);

namespace Database\Seeders\Mock;

use App\Models\Company;
use Illuminate\Database\Seeder;

final class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::factory()->count(8)->visible()->create();
        Company::factory()->count(2)->hidden()->create();
    }
}
