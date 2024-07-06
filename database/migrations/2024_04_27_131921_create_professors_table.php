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
        Schema::create('professor', function (Blueprint $table) {
            $table->id('professors_id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nickName');
            $table->string('firstName');
            $table->string('lastName');
            $table->integer('areaId');
            $table->string('profilePicture')->nullable();
            $table->rememberToken();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professors');
    }
};
