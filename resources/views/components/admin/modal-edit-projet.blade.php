@props(['technologies'])

{{-- Utilisation : <x-admin.modal-edit-projet :technologies="$technologies" /> --}}
<div id="editProjetModal"
    class="fixed inset-0 z-50 hidden items-center justify-center p-4"
    role="dialog" aria-modal="true" aria-labelledby="editProjetModalTitle">

    {{-- Overlay --}}
    <div class="absolute inset-0 bg-primary/20 backdrop-blur-sm" onclick="closeEditProjetModal()"></div>

    {{-- Carte --}}
    <div id="editProjetModalCard"
        class="relative w-full max-w-2xl bg-background border border-primary/10 rounded-3xl shadow-2xl p-8 space-y-6
               translate-y-4 opacity-0 transition-all duration-300 ease-out max-h-[90vh] overflow-y-auto">

        {{-- En-tête --}}
        <div class="flex items-center justify-between">
            <div>
                <h2 id="editProjetModalTitle" class="text-xl font-bold tracking-tight text-primary">Modifier le Projet</h2>
                <p class="text-xs text-secondary mt-0.5">Mettez à jour les informations du projet.</p>
            </div>
            <button type="button" onclick="closeEditProjetModal()"
                class="flex items-center justify-center w-8 h-8 rounded-full bg-primary/5 hover:bg-primary/10 text-secondary hover:text-primary transition-colors">
                <span class="material-symbols-outlined text-base">close</span>
            </button>
        </div>

        {{-- Formulaire --}}
        <form id="editProjetForm" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            {{-- Nom --}}
            <div class="space-y-1.5">
                <label class="text-xs font-bold uppercase tracking-wider text-secondary">Nom du projet</label>
                <input type="text" id="editProjetNom" name="nom" required
                    class="w-full rounded-xl border border-primary/10 bg-primary/5 px-4 py-3 text-sm font-medium text-primary
                           outline-none focus:border-cta focus:ring-2 focus:ring-cta/10 transition-all">
            </div>

            {{-- Description --}}
            <div class="space-y-1.5">
                <label class="text-xs font-bold uppercase tracking-wider text-secondary">Description</label>
                <textarea id="editProjetDescription" name="description" rows="4" required
                    class="w-full rounded-xl border border-primary/10 bg-primary/5 px-4 py-3 text-sm font-medium text-primary
                           outline-none focus:border-cta focus:ring-2 focus:ring-cta/10 transition-all resize-none"></textarea>
            </div>

            {{-- Image --}}
            <div class="space-y-1.5">
                <label class="text-xs font-bold uppercase tracking-wider text-secondary">Image de couverture</label>
                <div class="flex items-center gap-4">
                    <img id="editProjetImagePreview" src="" alt="Aperçu"
                        class="w-20 h-14 object-cover rounded-lg border border-primary/10 shadow-sm hidden">
                    <input type="file" name="image_couverture" accept="image/*"
                        class="block w-full text-xs text-secondary
                               file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0
                               file:text-xs file:font-bold file:bg-primary/5 file:text-secondary hover:file:bg-primary/10 cursor-pointer">
                </div>
                <p class="text-[10px] text-secondary/60">Laissez vide pour conserver l'image actuelle.</p>
            </div>

            {{-- Technologies --}}
            <div class="space-y-1.5">
                <label class="text-xs font-bold uppercase tracking-wider text-secondary">Technologies</label>
                <div class="grid grid-cols-3 gap-3 p-4 rounded-2xl bg-primary/5 border border-primary/10">
                    @foreach($technologies as $tech)
                        <label class="flex items-center gap-2 cursor-pointer group">
                            <input type="checkbox" name="technologies[]" value="{{ $tech->id }}"
                                data-tech-id="{{ $tech->id }}"
                                class="edit-tech-checkbox w-4 h-4 rounded border-primary/20 text-cta focus:ring-cta">
                            <span class="text-xs font-medium text-secondary group-hover:text-cta transition-colors">{{ $tech->nom }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            {{-- Actions --}}
            <div class="flex gap-3 pt-2">
                <button type="button" onclick="closeEditProjetModal()"
                    class="flex-1 rounded-full border border-primary/10 bg-primary/5 px-5 py-3 text-sm font-semibold text-secondary
                           hover:bg-primary/10 hover:text-primary transition-all active:scale-95">
                    Annuler
                </button>
                <button type="submit"
                    class="flex-1 flex items-center justify-center gap-2 rounded-full bg-cta px-5 py-3 text-sm font-semibold text-white
                           hover:bg-cta/90 transition-all active:scale-95">
                    <span class="material-symbols-outlined text-sm">save</span>
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>
