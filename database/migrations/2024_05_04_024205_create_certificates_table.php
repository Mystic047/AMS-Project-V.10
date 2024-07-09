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
        Schema::create('certificate', function (Blueprint $table) {
            $table->id('certificateId');
            $table->string('fileName');
            $table->string('templatePath');
            // $table->string('activity_type_id'); //still not having the talble
            $table->integer('createdBy')->nullable(); //User id
            $table->string('createdByRole')->nullable(); // user role
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate');
    }
};
