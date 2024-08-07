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
        Schema::table('activitySubmit', function (Blueprint $table) {
            $table->boolean('statusCheckInMorning')->nullable()->change();
            $table->boolean('statusCheckInAfternoon')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('activitySubmit', function (Blueprint $table) {
            $table->string('statusCheckInMorning')->nullable()->change();
            $table->string('statusCheckInAfternoon')->nullable()->change();
        });
    }
};
