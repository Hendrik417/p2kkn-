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
    Schema::create('tb_news', function (Blueprint $table) {
        $table->bigIncrements('id_news');
        $table->string('title');
        $table->text('text')->nullable();
        $table->string('picture')->nullable();
        $table->date('published_date')->nullable();
        $table->string('place')->nullable();
        $table->boolean('status')->default(1);
        $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_news');
    }
};
