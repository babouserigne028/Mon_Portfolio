@extends('layouts.app')
@section('content')
    <x-header :nom="$utilisateur->nom" :prenom="$utilisateur->prenom" />
    <div class="pt-5">
        <section id="contact" class="py-16 bg-primary text-white">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-16 reveal">
                    <x-Contact.infos-section :localisation="$utilisateur->adresse" :email="$utilisateur->email" />
                    <x-Contact.formulaire />
                </div>
            </div>
        </section>
        <x-footer />
    </div>
@endsection
