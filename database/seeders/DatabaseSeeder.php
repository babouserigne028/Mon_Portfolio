<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
<<<<<<< HEAD
        $this->call([
            UtilisateurSeeder::class,
            DomaineCompetenceSeeder::class,
            TechnologieSeeder::class,
            ProjetSeeder::class,
            ProjetTechnologieSeeder::class,
            TechnologieDomaineCompetenceSeeder::class,
=======
        // 1. CRÉATION DE L'ADMIN 
        $adminUser = User::create([
            'id' => (string) Str::uuid(),
            'prenom' => 'Serigne Abdoulaye', 
            'nom' => 'Babou',              
            'email' => 'admin@test.com',
            'mot_de_passe' => Hash::make('admin'), 
            'apropos' => 'Je construis des applications web évolutives avec un souci d\'expérience utilisateur et de code propre. Je suis spécialisé dans la transformation de problèmes complexes en solutions digitales élégantes.',
            'nbre_annee_experience' => 5,
            'photo' => 'Gemini_Generated_Image_o0n92ho0n92ho0n9.png', 
            'lien_cv' => 'CvTest.pdf',     
            'adresse' => 'Dakar, Sénégal', 
>>>>>>> a4de82a (Finalisation Admin Kingston : En utilisant Utilisateur)
        ]);

    }
}
