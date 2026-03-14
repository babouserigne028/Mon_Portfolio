<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

// Ajoute les use nécessaires si besoin (User, Str, Hash)

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            //UtilisateurSeeder::class,
            //DomaineCompetenceSeeder::class,
            //TechnologieSeeder::class,
            //ProjetSeeder::class,
            //ProjetTechnologieSeeder::class,
            //TechnologieDomaineCompetenceSeeder::class,
        ]);
    }
}
