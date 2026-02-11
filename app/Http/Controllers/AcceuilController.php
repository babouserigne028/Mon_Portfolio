<?php
namespace App\Http\Controllers;

use App\Models\DomaineCompetence;
use App\Models\Projet;
use App\Models\Utilisateur;

class AcceuilController extends Controller
{
<<<<<<< HEAD
    public function acceuil()
    {

        $utilisateur = Utilisateur::first();
        $domaines    = DomaineCompetence::with('technologies')->get();
        $projets     = Projet::with('technologies')->get();

        return view('pages.acceuil', compact('utilisateur', 'domaines', 'projets'));
    }
=======
public function acceuil()
{
    $utilisateur = \App\Models\User::first(); 

    $prenom = $utilisateur->prenom; 
    $nom = $utilisateur->nom;
    
    $apropos = $utilisateur->apropos;
    $nbre_annee_experience = $utilisateur->nbre_annee_experience;
    $photo = $utilisateur->photo;
    $lien_cv = $utilisateur->lien_cv;

    $domaines = \App\Models\DomaineCompetence::with('technologies')->get();
    $projets = \App\Models\Projet::with('technologies')->get();

    return view('pages.acceuil', compact(
        'utilisateur', 'prenom', 'nom', 'apropos', 
        'nbre_annee_experience', 'photo', 'lien_cv', 'domaines', 'projets'
    ));
>>>>>>> a4de82a (Finalisation Admin Kingston : En utilisant Utilisateur)
}
