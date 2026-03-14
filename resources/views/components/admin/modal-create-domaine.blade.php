{{-- Utilisation : <x-admin.modal-create-domaine /> --}}
<div id="createModal"
    class="fixed inset-0 z-50 hidden items-center justify-center p-4"
    role="dialog" aria-modal="true" aria-labelledby="createModalTitle">

    {{-- Overlay --}}
    <div class="absolute inset-0 bg-primary/20 backdrop-blur-sm" onclick="closeCreateModal()"></div>

    {{-- Carte du modal --}}
    <div class="relative w-full max-w-md bg-background border border-primary/10 rounded-3xl shadow-2xl p-8 space-y-6
                translate-y-4 opacity-0 transition-all duration-300 ease-out"
         id="createModalCard">

        {{-- En-tête --}}
        <div class="flex items-center justify-between">
            <div>
                <h2 id="createModalTitle" class="text-xl font-bold tracking-tight text-primary">
                    Ajouter un domaine
                </h2>
                <p class="text-xs text-secondary mt-0.5">Créez un nouveau domaine de compétence.</p>
            </div>
            <button type="button" onclick="closeCreateModal()"
                class="flex items-center justify-center w-8 h-8 rounded-full bg-primary/5 hover:bg-primary/10 text-secondary hover:text-primary transition-colors">
                <span class="material-symbols-outlined text-base">close</span>
            </button>
        </div>

        {{-- Formulaire --}}
        <form action="{{ route('admin.domaines.store') }}" method="POST" class="space-y-5">
            @csrf

            {{-- Nom --}}
            <div class="space-y-1.5">
                <label for="createNom" class="text-xs font-bold uppercase tracking-wider text-secondary">
                    Nom du domaine
                </label>
                <input type="text" id="createNom" name="nom" required
                    class="w-full rounded-xl border border-primary/10 bg-primary/5 px-4 py-3 text-sm font-medium text-primary
                           outline-none focus:border-cta focus:ring-2 focus:ring-cta/10 transition-all placeholder:text-secondary/40"
                    placeholder="ex : Développement Web">
                @error('nom') <p class="text-xs text-red-500">{{ $message }}</p> @enderror
            </div>

            {{-- Description --}}
            <div class="space-y-1.5">
                <label for="createDescription" class="text-xs font-bold uppercase tracking-wider text-secondary">
                    Description
                </label>
                <textarea id="createDescription" name="description" rows="2"
                    class="w-full rounded-xl border border-primary/10 bg-primary/5 px-4 py-3 text-sm font-medium text-primary
                           outline-none focus:border-cta focus:ring-2 focus:ring-cta/10 transition-all placeholder:text-secondary/40 resize-none"
                    placeholder="Décrivez ce domaine…"></textarea>
                @error('description') <p class="text-xs text-red-500">{{ $message }}</p> @enderror
            </div>

            {{-- Icône --}}
            <div class="space-y-1.5">
                <label for="createIcone" class="text-xs font-bold uppercase tracking-wider text-secondary">
                    Icône <span class="normal-case font-normal text-secondary/60">(Material Symbol)</span>
                </label>
                <div class="flex items-center gap-3">
                    <div class="flex items-center justify-center w-10 h-10 rounded-xl bg-primary/5 border border-primary/10 shrink-0">
                        <span id="createIconePreview" class="material-symbols-outlined text-xl text-secondary">code</span>
                    </div>
                    <input type="text" id="createIcone" name="icone"
                        class="w-full rounded-xl border border-primary/10 bg-primary/5 px-4 py-3 text-sm font-medium text-primary
                               outline-none focus:border-cta focus:ring-2 focus:ring-cta/10 transition-all placeholder:text-secondary/40"
                        placeholder="ex : code, brush, devices…"
                        oninput="document.getElementById('createIconePreview').textContent = this.value || 'code'">
                </div>
                @error('icone') <p class="text-xs text-red-500">{{ $message }}</p> @enderror
            </div>

            {{-- Couleur --}}
            <div class="space-y-1.5">
                <label for="createCouleur" class="text-xs font-bold uppercase tracking-wider text-secondary">
                    Couleur
                </label>
                <div class="flex items-center gap-3">
                    <input type="color" id="createCouleur" name="couleur" value="#2563eb"
                        class="h-10 w-10 cursor-pointer rounded-xl border border-primary/10 bg-primary/5 p-1 outline-none
                               focus:border-cta transition-all shrink-0"
                        oninput="document.getElementById('createCouleurHex').textContent = this.value">
                    <div class="flex-1 flex items-center gap-2 rounded-xl border border-primary/10 bg-primary/5 px-4 py-3">
                        <span id="createCouleurHex" class="text-sm font-mono font-medium text-primary">#2563eb</span>
                    </div>
                </div>
                @error('couleur') <p class="text-xs text-red-500">{{ $message }}</p> @enderror
            </div>

            {{-- Actions --}}
            <div class="flex gap-3 pt-2">
                <button type="button" onclick="closeCreateModal()"
                    class="flex-1 rounded-full border border-primary/10 bg-primary/5 px-5 py-3 text-sm font-semibold text-secondary
                           hover:bg-primary/10 hover:text-primary transition-all active:scale-95">
                    Annuler
                </button>
                <button type="submit"
                    class="flex-1 flex items-center justify-center gap-2 rounded-full bg-cta px-5 py-3 text-sm font-semibold text-white
                           hover:bg-cta/90 transition-all active:scale-95">
                    <span class="material-symbols-outlined text-sm">add_circle</span>
                    Créer
                </button>
            </div>
        </form>
    </div>
</div>
