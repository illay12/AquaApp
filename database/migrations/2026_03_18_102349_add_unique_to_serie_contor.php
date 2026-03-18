<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Pas 1: stergem duplicatele — pastram cel mai recent rand per serie_contor
        // Wrappam subquery-ul intr-un alias (necesar in MySQL)
        DB::statement('
            DELETE FROM contoare
            WHERE id NOT IN (
                SELECT id FROM (
                    SELECT MAX(id) AS id FROM contoare GROUP BY serie_contor
                ) AS tmp_keep
            )
        ');

        // Pas 2: adaugam constraint UNIQUE
        Schema::table('contoare', function (Blueprint $table) {
            $table->unique('serie_contor');
        });
    }

    public function down(): void
    {
        Schema::table('contoare', function (Blueprint $table) {
            $table->dropUnique(['serie_contor']);
        });
    }
};
