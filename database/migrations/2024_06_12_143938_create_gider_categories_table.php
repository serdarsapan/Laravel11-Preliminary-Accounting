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
        Schema::create('gider_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gider_id');
            $table->unsignedBigInteger('category_id');
            $table->foreign('gider_id')->references('gider_id')->on('gider')->onDelete('cascade');
            $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gider_categories');
    }
};
