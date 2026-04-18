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
        // Nama tabel diubah menjadi 'lecturer' sesuai $table di Model
        Schema::create('lecturer', function (Blueprint $table) {
            // Primary key 'id' sesuai $primaryKey di Model
            $table->id();

            // Kolom yang didefinisikan di $fillable Model:
            $table->string('user_id')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('username')->unique();
            $table->string('name');
            $table->string('faculties')->nullable();
            $table->string('study_program'); // Sesuai nama di model (tanpa 's')
            $table->integer('number_of_groups')->default(0);
            $table->string('location')->nullable();

            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Nama tabel disesuaikan untuk proses rollback
        Schema::dropIfExists('lecturer');
    }
};
