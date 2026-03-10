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
    Schema::create('tb_lecturer', function (Blueprint $table) {
        $table->bigIncrements('id_lecturer');
        $table->string('name');
        $table->string('email')->unique();
        $table->string('password');
        $table->unsignedBigInteger('faculty_id')->nullable();
        $table->unsignedBigInteger('study_program_id')->nullable();
        $table->unsignedInteger('number_of_groups')->default(0);
        $table->unsignedBigInteger('location_id')->nullable();
        $table->timestamps();
    });
  }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_lecturers');
    }
};
