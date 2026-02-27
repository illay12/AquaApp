<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contoare', function (Blueprint $table) {
            $table->unsignedInteger('index_nou')->nullable()->after('index_vechi');
        });
    }

    public function down(): void
    {
        Schema::table('contoare', function (Blueprint $table) {
            $table->dropColumn('index_nou');
        });
    }
};
