@extends('layouts.app')
@section('content')
    <x-header :nom="$utilisateur->nom" :prenom="$utilisateur->prenom" />
    <div class="pt-5">
        <x-Acceuil.hero--section
            :prenom="$utilisateur->prenom"
            :nom="$utilisateur->nom"
            :apropos="$utilisateur->apropos"
            :nbre_annee_experience="$utilisateur->nbre_annee_experience"
            :photo="$utilisateur->photo"
            :lien_cv="$utilisateur->lien_cv" />
        <x-Acceuil.expertise--section :domaines="$domaines" />
        <x-Acceuil.sommaire--section :projets="$projets" />
        <x-Acceuil.newsletter--section />
        <x-footer />
    </div>
@endsection
