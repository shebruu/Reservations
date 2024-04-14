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


        Schema::rename('representation_user', 'reservations');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('reservations', 'representation_user');
    }
};
