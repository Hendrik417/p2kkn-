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
     Schema::create('tb_students', function (Blueprint $table) {
        $table->bigIncrements('id_students');
        $table->string('name');
        $table->string('nim')->unique();
        $table->string('email')->unique();
        $table->string('groups')->nullable();
        $table->string('faculties')->nullable();
        $table->string('batch')->nullable();
        $table->string('status')->nullable();
        $table->string('locations')->nullable();
        $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_student');
    }
};
