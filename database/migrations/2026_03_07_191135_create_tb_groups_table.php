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
        Schema::create('tb_groups', function (Blueprint $table) {
            $table->bigIncrements('id_groups');
            $table->string('periods');
            $table->string('groups_names');
            $table->string('villages');
            $table->string('districts');
            $table->string('regency');
            $table->string('survising_lectures');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_groups');
    }
};
