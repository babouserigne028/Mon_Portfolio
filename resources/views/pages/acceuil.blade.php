@extends('layouts.app')
@section('content')
<<<<<<< HEAD
    <x-header :nom="$utilisateur->nom" />

    <div class="pt-20">
        <!-- Appel du composant avec les données du contrôleur -->
        <x-Acceuil.hero--section :prenom="$utilisateur->prenom ?? ($utilisateur->first_name ?? '')" :nom="$utilisateur->nom" :apropos="$utilisateur->apropos" :nbre_annee_experience="$utilisateur->nbre_annee_experience" :photo="$utilisateur->photo"
            :lien_cv="$utilisateur->lien_cv" />

=======
    <x-header :nom="$utilisateur->nom" :prenom="$utilisateur->prenom" />
    <div class="pt-5">
        <x-Acceuil.hero--section
            :prenom="$utilisateur->prenom"
            :nom="$utilisateur->nom"
            :apropos="$utilisateur->apropos"
            :nbre_annee_experience="$utilisateur->nbre_annee_experience"
            :photo="$utilisateur->photo"
            :lien_cv="$utilisateur->lien_cv" />
>>>>>>> d656bf2 (final commit)
        <x-Acceuil.expertise--section :domaines="$domaines" />
        <x-Acceuil.sommaire--section :projets="$projets" />
        <x-Acceuil.newsletter--section />
        <x-footer />
    </div>
@endsection
