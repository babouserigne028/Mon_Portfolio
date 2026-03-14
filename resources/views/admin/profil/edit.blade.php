@extends('layouts.admin')

@section('content')
<div class="max-w-8xl">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold tracking-tight text-primary">Mon Profil</h1>
        <span class="px-3 py-1 bg-cta/10 text-cta text-xs font-bold rounded-full border border-cta/20">
            Admin
        </span>
    </div>

    <form id="profilForm" action="{{ route('admin.profil.update') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        @csrf
        @method('PUT')

        <!-- Colonne Gauche : Photo & CV -->
        <div class="space-y-6">
            <div class="bg-background p-6 rounded-3xl border border-primary/10 shadow-sm text-center">
                <div class="relative w-32 h-32 mx-auto mb-4">
                    @if($utilisateur->photo)
                        <img src="{{ asset('storage/' . $utilisateur->photo) }}" class="w-full h-full object-cover rounded-full border-4 border-background shadow-md">
                    @else
                        <div class="w-full h-full bg-primary/5 rounded-full flex items-center justify-center text-secondary border-4 border-background shadow-md">
                            <span class="material-symbols-outlined text-4xl">person</span>
                        </div>
                    @endif
                    <label for="photo" class="absolute bottom-0 right-0 bg-cta text-white p-2 rounded-full cursor-pointer hover:bg-cta/90 transition shadow-lg">
                        <span class="material-symbols-outlined text-sm block">edit</span>
                    </label>
                    <input type="file" name="photo" id="photo" class="hidden">
                </div>
                <h3 class="font-bold text-primary">{{ $utilisateur->prenom }} {{ $utilisateur->nom }}</h3>
                <p class="text-xs text-secondary mb-4">Fullstack Developer</p>

                <div class="border-t border-primary/10 pt-4">
                    <label class="block text-xs font-bold uppercase text-secondary/60 mb-2">Curriculum Vitae</label>
                    <input type="file" name="lien_cv" class="block w-full text-xs text-secondary file:mr-2 file:py-2 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-primary/5 file:text-secondary hover:file:bg-primary/10 cursor-pointer">
                    @if($utilisateur->lien_cv)
                        <a href="{{ asset('storage/' . $utilisateur->lien_cv) }}" target="_blank" class="text-xs text-cta hover:underline mt-2 flex items-center justify-center gap-1">
                            <span class="material-symbols-outlined text-[10px]">visibility</span> Voir le CV actuel
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Colonne Droite : Infos -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-background p-8 rounded-3xl border border-primary/10 shadow-sm space-y-6">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-xs font-bold uppercase text-secondary">Prénom</label>
                        <input type="text" name="prenom" value="{{ $utilisateur->prenom }}" class="w-full rounded-xl border border-primary/10 px-4 py-3 text-sm outline-none focus:border-cta bg-primary/5 text-primary transition" placeholder="Ex: Serigne Abdoulaye">
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-bold uppercase text-secondary">Nom</label>
                        <input type="text" name="nom" value="{{ $utilisateur->nom }}" class="w-full rounded-xl border border-primary/10 px-4 py-3 text-sm outline-none focus:border-cta bg-primary/5 text-primary transition" placeholder="Ex: Babou">
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase text-secondary">Email (Identifiant de connexion)</label>
                    <input type="email" name="email" value="{{ $utilisateur->email }}" class="w-full rounded-xl border border-primary/10 px-4 py-3 text-sm outline-none focus:border-cta bg-primary/5 text-primary transition">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase text-secondary">À propos de moi (Bio Accueil)</label>
                    <textarea name="apropos" rows="4" class="w-full rounded-xl border border-primary/10 px-4 py-3 text-sm outline-none focus:border-cta bg-primary/5 text-primary transition">{{ $utilisateur->apropos }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-xs font-bold uppercase text-secondary">Années d'expérience</label>
                        <input type="number" name="nbre_annee_experience" value="{{ $utilisateur->nbre_annee_experience }}" class="w-full rounded-xl border border-primary/10 px-4 py-3 text-sm outline-none focus:border-cta bg-primary/5 text-primary transition">
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-bold uppercase text-secondary">Modifier mot de passe</label>
                        <input type="text" name="password" class="w-full rounded-xl border border-primary/10 px-4 py-3 text-sm outline-none focus:border-cta bg-primary/5 text-primary transition" placeholder="Laisser vide pour inchangé">
                    </div>
                </div>

                <div class="pt-4 flex justify-end">
                    <button id="submitBtn" type="submit" disabled
                        class="flex items-center gap-2 rounded-full px-8 py-3 text-sm font-semibold transition-all
                               bg-primary/10 text-secondary cursor-not-allowed
                               disabled:opacity-50">
                        <span class="material-symbols-outlined text-sm">save</span>
                        Mettre à jour mon Portfolio
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
    @vite('resources/js/admin/profil.js')
@endpush
