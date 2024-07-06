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
        Schema::create('fileForDownload', function (Blueprint $table) {
            $table->id('fileId');
            $table->string('fileName');
            $table->string('filePath');
            $table->integer('createdBy')->nullable();
            $table->string('createdByRole')->nullable();
            $table->timestamps();
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
