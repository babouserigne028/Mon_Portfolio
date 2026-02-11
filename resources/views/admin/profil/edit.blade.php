@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold tracking-tight text-slate-900">Mon Profil</h1>
        <span class="px-3 py-1 bg-primary/10 text-primary text-xs font-bold rounded-full border border-primary/20">
            Admin
        </span>
    </div>

    <form action="{{ route('admin.profil.update') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        @csrf
        @method('PUT')

        <!-- Colonne Gauche : Photo & CV -->
        <div class="space-y-6">
            <div class="bg-white p-6 rounded-3xl border border-slate-200/60 shadow-sm text-center">
                <div class="relative w-32 h-32 mx-auto mb-4">
                    @if(Auth::user()->photo)
                        <img src="{{ asset('storage/' . Auth::user()->photo) }}" class="w-full h-full object-cover rounded-full border-4 border-slate-50 shadow-md">
                    @else
                        <div class="w-full h-full bg-slate-100 rounded-full flex items-center justify-center text-slate-400 border-4 border-white shadow-md">
                            <span class="material-symbols-outlined text-4xl">person</span>
                        </div>
                    @endif
                    <label for="photo" class="absolute bottom-0 right-0 bg-primary text-white p-2 rounded-full cursor-pointer hover:bg-primary/90 transition shadow-lg">
                        <span class="material-symbols-outlined text-sm block">edit</span>
                    </label>
                    <input type="file" name="photo" id="photo" class="hidden">
                </div>
                <h3 class="font-bold text-slate-900">{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</h3>
                <p class="text-xs text-slate-500 mb-4">Fullstack Developer</p>
                
                <div class="border-t border-slate-100 pt-4">
                    <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Curriculum Vitae</label>
                    <input type="file" name="lien_cv" class="block w-full text-xs text-slate-500 file:mr-2 file:py-2 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-slate-100 file:text-slate-600 hover:file:bg-slate-200 cursor-pointer">
                    @if(Auth::user()->lien_cv)
                        <a href="{{ asset('storage/' . Auth::user()->lien_cv) }}" target="_blank" class="text-xs text-primary hover:underline mt-2 block flex items-center justify-center gap-1">
                            <span class="material-symbols-outlined text-[10px]">visibility</span> Voir le CV actuel
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Colonne Droite : Infos -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white p-8 rounded-3xl border border-slate-200/60 shadow-sm space-y-6">
                
                <!-- SECTION IDENTITÉ (SÉPARÉE) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-xs font-bold uppercase text-slate-500">Prénom</label>
                        <input type="text" name="first_name" value="{{ Auth::user()->prenom }}" class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none focus:border-primary bg-slate-50/30 transition" placeholder="Ex: Serigne Abdoulaye">
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-bold uppercase text-slate-500">Nom</label>
                        <input type="text" name="last_name" value="{{ Auth::user()->nom }}" class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none focus:border-primary bg-slate-50/30 transition" placeholder="Ex: Babou">
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase text-slate-500">Email (Identifiant de connexion)</label>
                    <input type="email" name="email" value="{{ Auth::user()->email }}" class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none focus:border-primary bg-slate-50/30 transition">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase text-slate-500">À propos de moi (Bio Accueil)</label>
                    <textarea name="apropos" rows="4" class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none focus:border-primary bg-slate-50/30 transition">{{ Auth::user()->apropos }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-xs font-bold uppercase text-slate-500">Années d'expérience</label>
                        <input type="number" name="nbre_annee_experience" value="{{ Auth::user()->nbre_annee_experience }}" class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none focus:border-primary bg-slate-50/30 transition">
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-bold uppercase text-slate-500">Modifier mot de passe</label>
                        <input type="password" name="password" class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none focus:border-primary bg-slate-50/30 transition" placeholder="Laisser vide pour inchangé">
                    </div>
                </div>

                <div class="pt-4 flex justify-end">
                    <button type="submit" class="flex items-center gap-2 rounded-xl bg-primary px-8 py-3 text-sm font-bold text-white shadow-lg shadow-primary/20 hover:bg-primary/90 transition-all active:scale-[0.98]">
                        <span class="material-symbols-outlined text-sm">save</span>
                        Mettre à jour mon Portfolio
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection