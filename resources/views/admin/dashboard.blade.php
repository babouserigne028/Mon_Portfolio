@extends('layouts.admin')

@section('content')
    <div class="mb-10">
        <h2 class="text-3xl font-bold tracking-tight text-primary">Bienvenue, {{ Auth::user()->nom }}
            {{ Auth::user()->prenom }}</h2>
        <p class="text-secondary">Voici l'état actuel de votre portfolio.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-background p-6 rounded-3xl border border-primary/10 shadow-sm hover:shadow-md transition-all group">
            <div class="w-14 h-14 bg-cta/10 text-cta rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                <span class="material-symbols-outlined text-3xl">layers</span>
            </div>
            <div class="text-3xl font-bold text-primary">{{ \App\Models\Projet::count() }}</div>
            <div class="text-secondary uppercase text-[10px] tracking-widest font-bold mt-1">Projets Réalisés</div>
        </div>

        <div class="bg-background p-6 rounded-3xl border border-primary/10 shadow-sm hover:shadow-md transition-all group">
            <div class="w-14 h-14 bg-primary/5 text-secondary rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                <span class="material-symbols-outlined text-3xl">terminal</span>
            </div>
            <div class="text-3xl font-bold text-primary">{{ \App\Models\Technologie::count() }}</div>
            <div class="text-secondary uppercase text-[10px] tracking-widest font-bold mt-1">Technologies Maîtrisées</div>
        </div>

        <div class="bg-background p-6 rounded-3xl border border-primary/10 shadow-sm hover:shadow-md transition-all group">
            <div class="w-14 h-14 bg-success/10 text-success rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                <span class="material-symbols-outlined text-3xl">verified_user</span>
            </div>
            <div class="text-primary font-bold">Session Active</div>
            <div class="text-secondary uppercase text-[10px] tracking-widest font-bold mt-1">Accès Administrateur</div>
        </div>
    </div>
@endsection
