<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use App\Models\Anunt;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('anunturi', function (Blueprint $table) {
            // Adaugă slug dacă nu există
            if (!Schema::hasColumn('anunturi', 'slug')) {
                $table->string('slug')->nullable()->unique()->after('titlu');
            }

            // Adaugă categorie dacă nu există
            if (!Schema::hasColumn('anunturi', 'categorie')) {
                $table->string('categorie')->default('anunturi')->after('slug');
            }
        });

        // Generează slug pentru anunțurile existente care nu au
        Anunt::whereNull('slug')->orWhere('slug', '')->get()->each(function ($anunt) {
            $slug = Str::slug($anunt->titlu);
            $original = $slug;
            $count = 2;

            while (Anunt::where('slug', $slug)->where('id', '!=', $anunt->id)->exists()) {
                $slug = $original . '-' . $count++;
            }

            $anunt->updateQuietly(['slug' => $slug]);
        });

        // Acum că toate slug-urile sunt populate, facem coloana NOT NULL
        Schema::table('anunturi', function (Blueprint $table) {
            $table->string('slug')->nullable(false)->change();
        });
    }

    public function down(): void
    {
        Schema::table('anunturi', function (Blueprint $table) {
            $table->dropColumn(['slug', 'categorie']);
        });
    }
};
