<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\DispeceratUser;

class DispeceratUsersSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'username'  => 'angajari',
                'password'  => Hash::make('Angajari@2026'),
                'nume'      => 'Departament Angajări',
                'categorie' => 'angajare',
            ],
            [
                'username'  => 'laborator',
                'password'  => Hash::make('Laborator@2026'),
                'nume'      => 'Laborator – Calitate Apă',
                'categorie' => 'calitate',
            ],
            [
                'username'  => 'avarii',
                'password'  => Hash::make('Avarii@2026'),
                'nume'      => 'Dispecerat Avarii',
                'categorie' => 'avarie',
            ],
            [
                'username'  => 'diverse',
                'password'  => Hash::make('Diverse@2026'),
                'nume'      => 'Diverse & Anunțuri Generale',
                'categorie' => 'diverse',
            ],
        ];

        foreach ($users as $user) {
            DispeceratUser::updateOrCreate(
                ['username' => $user['username']],
                $user
            );
        }

        $this->command->info('✓ 4 useri dispecerat creați cu succes!');
        $this->command->table(
            ['Username', 'Parolă inițială', 'Categorie'],
            [
                ['angajari',  'Angajari@2026',  'Angajări'],
                ['laborator', 'Laborator@2026', 'Calitate apă'],
                ['avarii',    'Avarii@2026',    'Avarii'],
                ['diverse',   'Diverse@2026',   'Diverse'],
            ]
        );
        $this->command->warn('⚠ Schimbați parolele după primul login!');
    }
}
