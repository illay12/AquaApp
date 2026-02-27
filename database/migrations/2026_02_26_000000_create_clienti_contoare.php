<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clienti', function (Blueprint $table) {
            $table->id();
            $table->string('cod_client', 20)->unique()->index();
            $table->string('nume', 150);
            $table->string('telefon', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('adresa', 255)->nullable();
            $table->timestamps();
        });

        Schema::create('contoare', function (Blueprint $table) {
            $table->id();
            $table->string('cod_client', 20)->index();
            $table->string('serie_contor', 30);
            $table->string('adresa', 255);
            $table->decimal('index_vechi', 10, 3)->default(0);
            $table->timestamps();

            $table->foreign('cod_client')
                  ->references('cod_client')
                  ->on('clienti')
                  ->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contoare');
        Schema::dropIfExists('clienti');
    }
};
