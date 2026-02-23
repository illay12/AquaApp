<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('anunturi', function (Blueprint $table) {
            $table->id();
            $table->string('titlu');
            $table->text('continut');
            $table->timestamps(); // include created_at și updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('anunturi');
    }
};