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
        Schema::create('satis', function (Blueprint $table) {
            $table->id();
            $table->string('cari');
            $table->text('cariAdres')->nullable();
            $table->date('duzenlemeTarih')->date_format('MM/DD/YYYY');
            $table->time('duzenlemeSaat');
            $table->integer('seriNo')->nullable();
            $table->enum('odemeStatus', [0,1])->default(0);
            $table->string('bankName')->nullable();
            $table->date('odemeTarih')->nullable();
            $table->string('vadeTarih');
            $table->string('tags')->nullable();
            $table->text('description')->nullable();
            $table->string('urunHizmet');
            $table->integer('miktar');
            $table->decimal('birimFiyat', 12, 2);
            $table->decimal('kdv', 5, 2)->default(0);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('satis');
    }
};
