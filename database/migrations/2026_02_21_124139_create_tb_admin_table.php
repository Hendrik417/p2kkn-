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
        // Nama tabel diubah menjadi 'admin' sesuai properti $table di Model
        Schema::create('tb_admin', function (Blueprint $table) {
            // Primary key menggunakan 'id' sesuai properti $primaryKey di Model
            $table->id();

            // Field yang didefinisikan di $fillable Model
            $table->string('user_id')->unique(); // Menambahkan kolom userid
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');

            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Nama tabel disesuaikan untuk proses rollback
        Schema::dropIfExists('tb_admin');
    }
};
