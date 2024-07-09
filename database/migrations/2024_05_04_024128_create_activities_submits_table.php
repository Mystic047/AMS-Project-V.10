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
        Schema::create('activities_submits', function (Blueprint $table) {
            $table->id('activitySubmitId');
            $table->bigInteger('students_id');
            $table->string('activity_id');      
            $table->string('status_check_in_morning')->nullable();;
            $table->string('status_check_in_afternoon')->nullable();;
            $table->string('status')->default('ยังไม่เข้าร่วมกิจกรรม');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities_submits');
    }
};
