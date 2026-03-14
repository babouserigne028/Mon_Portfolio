@extends('layouts.app')
@section('content')
    <x-header :nom="$utilisateur->nom" :prenom="$utilisateur->prenom" />
    <div class="pt-5">
        <section class="py-16 bg-background">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <x-Projet.header-projets :technologies="$technologies" />
                <x-Projet.main-projets :projets="$projets" />
            </div>
        </section>
        <x-footer />
    </div>
@endsection
