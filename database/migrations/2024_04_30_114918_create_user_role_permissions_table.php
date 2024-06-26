
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
        Schema::create('user_role_permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('role_id');
            $table->integer('read_permission');
            $table->integer('create_permission');
            $table->integer('update_permission');
            $table->integer('delete_permission');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_role_permissions');
    }
};
