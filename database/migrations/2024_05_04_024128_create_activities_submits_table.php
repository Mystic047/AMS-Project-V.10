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
        Schema::create('activitySubmit', function (Blueprint $table) {
            $table->id('actSubmitId');
            $table->bigInteger('userId');
            $table->bigInteger('actId');      
            $table->string('statusCheckInMorning')->nullable();;
            $table->string('statusCheckInAfternoon')->nullable();;
            $table->string('status')->default('ยังไม่เข้าร่วมกิจกรรม');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activitySubmit');
    }
};
