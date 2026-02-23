<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Anunt;

class AnuntSeeder extends Seeder
{
    public function run(): void
    {
        $anunturi = [
            [
                'titlu' => 'Mentenanță rețea apă - sector 1',
                'continut' => 'În data de 25 februarie, între orele 09:00-15:00, se vor efectua lucrări de mentenanță pe sectorul 1.'
            ],
            [
                'titlu' => 'Index apă lună februarie',
                'continut' => 'Rugăm clienții să transmită indexul contorului până pe 28 februarie pentru facturare.'
            ],
            [
                'titlu' => 'Program centru relații clienți',
                'continut' => 'Centrul nostru de relații clienți va fi deschis luni-vineri între 08:00-16:00.'
            ],
        ];

        foreach ($anunturi as $a) {
            Anunt::create($a);
        }
    }
}