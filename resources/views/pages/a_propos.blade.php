@extends('layouts.app')
@section('content')
    <x-header :nom="$utilisateur->nom" :prenom="$utilisateur->prenom" />
    <div class="pt-20">
        <section id="apropos" class="py-16">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-16 items-start">
                    <x-A_propos.narative--section :utilisateur="$utilisateur" />
                    <x-A_propos.skills--section :technologies="$technologies" />
                </div>
            </div>
        </section>
        <x-footer />
    </div>
@endsection
