<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->string('activity_id')->primary();
            $table->string('activity_name');
            $table->string('activity_type');
            $table->date('activity_date');
            $table->string('activity_responsible_branch');
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 11, 7);
            $table->string('activity_hour_earned');
            $table->string('activity_register_limit');
            $table->string('activity_detail');
            $table->string('assessment_link');
            $table->string('picture')->nullable();
            $table->string('created_by');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activites');
    }
};
