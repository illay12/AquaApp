<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('buletine_analiza', function (Blueprint $table) {
            $table->id();
            $table->string('luna');           // ex: Ianuarie
            $table->unsignedSmallInteger('an'); // ex: 2026
            $table->string('cale');           // calea fișierului în storage
            $table->string('nume_original');  // numele original al fișierului
            $table->unsignedBigInteger('marime'); // bytes
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('buletine_analiza');
    }
};
