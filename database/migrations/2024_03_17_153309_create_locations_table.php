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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 60)->unique();
            $table->string('designation', 60);
            $table->string('address', 255);
            $table->foreignId('locality_id')->constrained()->onUpdate('cascade');
            $table->string('website', 255)->nullable();
            $table->string('phone', 30)->nullable();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('locations');
        Schema::enableForeignKeyConstraints();
    }
};
