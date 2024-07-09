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
            $table->date('activity_date'); // End of registration date
            $table->string('activity_responsible_branch');
            $table->string('activity_hour_earned');
            $table->string('activity_register_limit');
            $table->string('activity_detail');
            $table->string('assessment_link');
            $table->string('activity_location');
            $table->string('picture')->nullable();
            $table->string('responsible_person')->nullable();
            $table->integer('created_by')->nullable(); //User id
            $table->string('created_by_role')->nullable(); // user role
            $table->string('morning_enrollment_key')->nullable(); // For morning enrollment key
            $table->string('afternoon_enrollment_key')->nullable(); // For afternoon enrollment key
            $table->boolean('is_open')->default(true);
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
