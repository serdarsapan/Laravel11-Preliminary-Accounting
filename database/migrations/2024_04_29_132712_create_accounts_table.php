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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->default(2);
            $table->string('name');
            $table->string('slug')->default('');
            $table->text('tags')->nullable();
            $table->text('oDate');
            $table->text('currency');
            $table->text('balance')->nullable();
            $table->text('iban')->nullable();
            $table->text('description')->nullable();
            $table->text('bankName')->nullable();
            $table->text('branch')->nullable();
            $table->integer('accountNo')->nullable();
            $table->enum('status', [0, 1])->default(0);
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
