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
        Schema::create('representation_user', function (Blueprint $table) {
            $table->id();
            $table->integer('places', false, true)->length(11);

            $table->foreignId('representation_id')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('representation_user');
    }
};
