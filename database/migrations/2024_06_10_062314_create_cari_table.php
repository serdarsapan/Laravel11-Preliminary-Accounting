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
        Schema::create('cari', function (Blueprint $table) {
            $table->id();
            $table->enum('cariStatus', [0,1])->default(0);
            $table->text('code');
            $table->string('name');
            $table->string('surname')->nullable();
            $table->string('type')->nullable();
            $table->date('islemTarih')->date_format('MM/DD/YYYY');
            $table->text('tags')->nullable();
            $table->integer('tckn')->nullable();
            $table->integer('vergiNo')->nullable();
            $table->string('vergiDaire')->nullable();
            $table->text('mersis')->nullable();
            $table->integer('tel')->nullable();
            $table->string('mail')->nullable();
            $table->string('web')->nullable();
            $table->integer('faks')->nullable();
            $table->string('adresTip')->nullable();
            $table->text('adres')->nullable();
            $table->string('il')->nullable();
            $table->string('ilce')->nullable();
            $table->integer('posta')->nullable();
            $table->string('vade')->nullable();
            $table->integer('iskonto')->nullable();
            $table->integer('tutarAcilis')->nullable();
            $table->enum('acilisStatus', [0,1])->default(0);
            $table->date('islemTarihAcilis')->date_format('MM/DD/YYYY');
            $table->date('vadeTarihAcilis')->date_format('MM/DD/YYYY');
            $table->integer('tutarBorc')->nullable();
            $table->enum('borcStatus', [0,1])->default(0);
            $table->date('islemTarihBorc')->date_format('MM/DD/YYYY');
            $table->date('vadeTarihBorc')->date_format('MM/DD/YYYY');
            $table->text('description')->nullable();
            $table->string('hesapNo')->nullable();
            $table->text('bank')->nullable();
            $table->text('branch')->nullable();
            $table->text('iban')->nullable();
            $table->string('hesapName')->nullable();
            $table->string('yetkiliName')->nullable();
            $table->integer('yetkiliTel')->nullable();
            $table->string('yetkiliMail')->nullable();
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cari');
    }
};
