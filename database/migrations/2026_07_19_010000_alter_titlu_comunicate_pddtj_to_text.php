<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('comunicate_pddtj', function (Blueprint $table) {
            $table->text('titlu')->change();
        });
    }

    public function down(): void
    {
        Schema::table('comunicate_pddtj', function (Blueprint $table) {
            $table->string('titlu')->change();
        });
    }
};
