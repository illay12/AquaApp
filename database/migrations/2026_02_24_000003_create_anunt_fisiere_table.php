<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('anunt_fisiere', function (Blueprint $table) {
            $table->id();
            $table->foreignId('anunt_id')->constrained('anunturi')->onDelete('cascade');
            $table->string('nume_original');   // numele original al fișierului
            $table->string('cale');            // calea în storage
            $table->string('tip');             // pdf | docx | xlsx
            $table->unsignedBigInteger('marime'); // bytes
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('anunt_fisiere');
    }
};
