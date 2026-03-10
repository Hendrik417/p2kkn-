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
    Schema::create('tb_periods', function (Blueprint $table) {
        $table->bigIncrements('id_periods');
        $table->string('period_name');
        $table->date('active_start_date');
        $table->date('active_end_date');
        $table->boolean('status')->default(1);
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_periods');
    }
};
