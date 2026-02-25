<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dispecerat_users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('nume')->nullable();         // nume afișat în panou
            $table->string('categorie');                // angajare | calitate | avarie | diverse
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dispecerat_users');
    }
};
