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
        Schema::create('activity', function (Blueprint $table) {
            $table->string('actId')->primary();
            $table->string('actName');
            $table->string('actType');
            $table->date('actDate'); 
            $table->string('actResBranch');
            $table->string('actHour');
            $table->string('actRegisLimit');
            $table->string('actDetails');
            $table->string('assessmentLink');
            $table->string('actLocation');
            $table->string('picture')->nullable();
            $table->string('responsiblePerson')->nullable();
            $table->integer('createdBy')->nullable(); //User id
            $table->string('createdByRole')->nullable(); // user role
            $table->string('morningEnrollmentKey')->nullable(); // For morning enrollment key
            $table->string('afternoonEnrollmentKey')->nullable(); // For afternoon enrollment key
            $table->boolean('isOpen')->default(true);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity');
    }
};
