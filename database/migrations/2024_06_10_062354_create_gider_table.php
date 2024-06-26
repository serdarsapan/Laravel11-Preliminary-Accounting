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
        Schema::create('gider', function (Blueprint $table) {
            $table->id();
            $table->string('cari');
            $table->date('duzenlemeTarih')->date_format('MM/DD/YYYY');
            $table->integer('seriNo')->nullable();
            $table->string('giderTip');
            $table->enum('odemeStatus', [0,1])->default(0);
            $table->string('bankName')->nullable();
            $table->date('odemeTarih')->nullable();
            $table->string('sonOdeme');
            $table->string('tags')->nullable();
            $table->text('description')->nullable();
            $table->decimal('faturaTutar', 12, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gider');
    }
};
