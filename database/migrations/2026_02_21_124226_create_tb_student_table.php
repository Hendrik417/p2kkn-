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
        // Nama tabel diubah menjadi 'students' sesuai $table di Model
        Schema::create('students', function (Blueprint $table) {
            $table->id(); // Primary key (id) sesuai $primaryKey di Model

            // Field yang didefinisikan di $fillable Model:
            $table->string('user_id')->unique(); // ID unik user (misal: NIM atau ID sistem)
            $table->string('email')->unique();
            $table->string('password');
            $table->string('username')->unique();
            $table->string('name');
            $table->string('groups')->nullable();
            $table->string('faculties')->nullable();
            $table->integer('batch'); // Tahun angkatan
            $table->string('status')->default('active'); // Status mahasiswa

            $table->timestamps(); // create_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
