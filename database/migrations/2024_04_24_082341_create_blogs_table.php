
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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->default(2);
            $table->enum('statusUrnHzm', [0, 1])->default(0);
            $table->text('code')->nullable();
            $table->string('name')->nullable();
            $table->text('barcode')->nullable();
            $table->text('tags')->nullable();
            $table->text('origin')->nullable();
            $table->text('gtip')->nullable();
            $table->text('description')->nullable();
            $table->text('hzmCode')->nullable();
            $table->string('hzmName')->nullable();
            $table->text('hzmBarcode')->nullable();
            $table->text('hzmTags')->nullable();
            $table->text('hzmDescription')->nullable();
            $table->enum('statusAlis', [0, 1])->default(0);
            $table->decimal('alisFiyat', 12, 2);
            $table->enum('statusSatis', [0, 1])->default(0);
            $table->decimal('satisFiyat', 12, 2);
            $table->decimal('kdv', 5, 2)->default(0); // We could need one more kdv for alis-satis
            $table->text('discount')->nullable();
            $table->timestamps();
        });
    }
   
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
