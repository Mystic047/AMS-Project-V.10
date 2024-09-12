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
        Schema::table('activitysubmit', function (Blueprint $table) {
            // Drop the existing foreign key constraint if needed
            // $table->dropForeign(['actId']); // Uncomment if a foreign key exists

            // Modify the actId column to be unsigned
            $table->unsignedBigInteger('actId')->change();

            // Add the foreign key constraint again with ON DELETE CASCADE
            $table->foreign('actId')
                  ->references('actId')
                  ->on('activity')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('activitysubmit', function (Blueprint $table) {
            $table->dropForeign(['actId']);
        });
    }
};

