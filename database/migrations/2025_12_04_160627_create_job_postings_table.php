<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_postings', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('description');
            $table->string('type')->comment('e.g. freelance or contract');
            $table->string('work_mode')->comment('e.g. remote, onsite, hybrid');
            $table->string('employment_hours')->comment('e.g. full-time, part-time');
            $table->string('salary');
            $table->string('application_url');
            $table->string('status');
            $table->timestamps();
        });
    }
};
