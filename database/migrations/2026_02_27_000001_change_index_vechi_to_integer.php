<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contoare', function (Blueprint $table) {
            $table->unsignedInteger('index_vechi')->default(0)->change();
        });
    }

    public function down(): void
    {
        Schema::table('contoare', function (Blueprint $table) {
            $table->decimal('index_vechi', 10, 3)->default(0)->change();
        });
    }
};
