{{-- Utilisation : <x-admin.modal-edit-domaine /> --}}
<div id="editModal"
    class="fixed inset-0 z-50 hidden items-center justify-center p-4"
    role="dialog" aria-modal="true" aria-labelledby="editModalTitle">

    {{-- Overlay --}}
    <div class="absolute inset-0 bg-primary/20 backdrop-blur-sm" onclick="closeEditModal()"></div>

    {{-- Carte du modal --}}
    <div class="relative w-full max-w-md bg-background border border-primary/10 rounded-3xl shadow-2xl p-8 space-y-6
                translate-y-4 opacity-0 transition-all duration-300 ease-out max-h-[90vh] overflow-y-auto"
         id="editModalCard">

        {{-- En-tête --}}
        <div class="flex items-center justify-between">
            <div>
                <h2 id="editModalTitle" class="text-xl font-bold tracking-tight text-primary">
                    Modifier le domaine
                </h2>
                <p class="text-xs text-secondary mt-0.5">Mettez à jour les informations du domaine.</p>
            </div>
            <button type="button" onclick="closeEditModal()"
                class="flex items-center justify-center w-8 h-8 rounded-full bg-primary/5 hover:bg-primary/10 text-secondary hover:text-primary transition-colors">
                <span class="material-symbols-outlined text-base">close</span>
            </button>
        </div>

        {{-- Formulaire --}}
        <form id="editModalForm" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            {{-- Nom --}}
            <div class="space-y-1.5">
                <label for="editNom" class="text-xs font-bold uppercase tracking-wider text-secondary">
                    Nom du domaine
                </label>
                <input type="text" id="editNom" name="nom" required
                    class="w-full rounded-xl border border-primary/10 bg-primary/5 px-4 py-3 text-sm font-medium text-primary
                           outline-none focus:border-cta focus:ring-2 focus:ring-cta/10 transition-all placeholder:text-secondary/40"
                    placeholder="ex : Développement Web">
            </div>

            {{-- Icône --}}
            <div class="space-y-1.5">
                <label for="editIcone" class="text-xs font-bold uppercase tracking-wider text-secondary">
                    Icône <span class="normal-case font-normal text-secondary/60">(Material Symbol)</span>
                </label>
                <div class="flex items-center gap-3">
                    <div class="flex items-center justify-center w-10 h-10 rounded-xl bg-primary/5 border border-primary/10 shrink-0">
                        <span id="iconePreview" class="material-symbols-outlined text-xl text-secondary">code</span>
                    </div>
                    <input type="text" id="editIcone" name="icone"
                        class="w-full rounded-xl border border-primary/10 bg-primary/5 px-4 py-3 text-sm font-medium text-primary
                               outline-none focus:border-cta focus:ring-2 focus:ring-cta/10 transition-all placeholder:text-secondary/40"
                        placeholder="ex : code, brush, devices…"
                        oninput="document.getElementById('iconePreview').textContent = this.value || 'code'">
                </div>
            </div>

            {{-- Couleur --}}
            <div class="space-y-1.5">
                <label for="editCouleur" class="text-xs font-bold uppercase tracking-wider text-secondary">
                    Couleur
                </label>
                <div class="flex items-center gap-3">
                    <input type="color" id="editCouleur" name="couleur"
                        class="h-10 w-10 cursor-pointer rounded-xl border border-primary/10 bg-primary/5 p-1 outline-none
                               focus:border-cta transition-all shrink-0"
                        oninput="document.getElementById('couleurHexValue').textContent = this.value">
                    <div class="flex-1 flex items-center gap-2 rounded-xl border border-primary/10 bg-primary/5 px-4 py-3">
                        <span id="couleurHexValue" class="text-sm font-mono font-medium text-primary">#000000</span>
                    </div>
                </div>
            </div>

            {{-- Actions --}}
            <div class="flex gap-3 pt-2">
                <button type="button" onclick="closeEditModal()"
                    class="flex-1 rounded-full border border-primary/10 bg-primary/5 px-5 py-3 text-sm font-semibold text-secondary
                           hover:bg-primary/10 hover:text-primary transition-all active:scale-95">
                    Annuler
                </button>
                <button type="submit"
                    class="flex-1 flex items-center justify-center gap-2 rounded-full bg-cta px-5 py-3 text-sm font-semibold text-white
                           hover:bg-cta/90 transition-all active:scale-95">
                    <span class="material-symbols-outlined text-sm">check_circle</span>
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>

