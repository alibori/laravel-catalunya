<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('community_packages', function (Blueprint $table): void {
            $table->string('slug')->nullable()->after('name');
        });

        DB::table('community_packages')->whereNull('slug')->eachById(function (object $package): void {
            DB::table('community_packages')
                ->where('id', $package->id)
                ->update(['slug' => Str::slug($package->name)]);
        });

        Schema::table('community_packages', function (Blueprint $table): void {
            $table->string('slug')->nullable(false)->unique()->change();
        });
    }
};
