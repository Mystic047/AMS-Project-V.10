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
        Schema::create('file_for_downloads', function (Blueprint $table) {
            $table->id('file_id');
            $table->string('fileName');
            $table->string('file_path');
            $table->string('professor_id');
            $table->string('admin_id');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_for_downloads');
    }
};
