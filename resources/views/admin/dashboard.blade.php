@extends('layouts.admin')

@section('content')
    <div class="mb-10">
<<<<<<< HEAD
        <h2 class="text-3xl font-bold tracking-tight text-slate-900">Bienvenue, {{ Auth::user()->nom }}
            {{ Auth::user()->prenom }}</h2>
        <p class="text-slate-500">Voici l'état actuel de votre portfolio.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-3xl border border-slate-200/60 shadow-sm hover:shadow-md transition-all group">
            <div
                class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                <span class="material-symbols-outlined text-3xl">layers</span>
            </div>
            <div class="text-3xl font-bold text-slate-900">{{ \App\Models\Projet::count() }}</div>
            <div class="text-slate-500 uppercase text-[10px] tracking-widest font-bold mt-1">Projets Réalisés</div>
        </div>

        <div class="bg-white p-6 rounded-3xl border border-slate-200/60 shadow-sm hover:shadow-md transition-all group">
            <div
                class="w-14 h-14 bg-amber-50 text-amber-600 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                <span class="material-symbols-outlined text-3xl">terminal</span>
            </div>
            <div class="text-3xl font-bold text-slate-900">{{ \App\Models\Technologie::count() }}</div>
            <div class="text-slate-500 uppercase text-[10px] tracking-widest font-bold mt-1">Technologies Maîtrisées</div>
        </div>

        <div class="bg-white p-6 rounded-3xl border border-slate-200/60 shadow-sm hover:shadow-md transition-all group">
            <div
                class="w-14 h-14 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                <span class="material-symbols-outlined text-3xl">verified_user</span>
            </div>
            <div class="text-slate-900 font-bold">Session Active</div>
            <div class="text-slate-500 uppercase text-[10px] tracking-widest font-bold mt-1">Accès Administrateur</div>
        </div>
    </div>

    <div class="mt-10">
        <a href="{{ route('admin.projets.create') }}"
            class="inline-flex items-center gap-2 px-6 py-3 bg-slate-900 text-white rounded-2xl font-bold hover:bg-slate-800 transition-all active:scale-95 shadow-xl shadow-slate-900/20">
            <span class="material-symbols-outlined text-sm">add</span> Nouveau Projet rapide
        </a>
    </div>
=======
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
>>>>>>> d656bf2 (final commit)
@endsection
