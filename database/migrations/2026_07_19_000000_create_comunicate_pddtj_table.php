<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('comunicate_pddtj', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->string('titlu');
            $table->string('fisier'); // numele fișierului PDF în storage/app/public/documente/pddtj/
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comunicate_pddtj');
    }
};
