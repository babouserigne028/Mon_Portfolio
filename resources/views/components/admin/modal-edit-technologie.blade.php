@props(['domaines'])

{{-- Utilisation : <x-admin.modal-edit-technologie :domaines="$domaines" /> --}}
<div id="editTechModal"
    class="fixed inset-0 z-50 hidden items-center justify-center p-4"
    role="dialog" aria-modal="true" aria-labelledby="editTechModalTitle">

    {{-- Overlay --}}
    <div class="absolute inset-0 bg-primary/20 backdrop-blur-sm" onclick="closeEditTechModal()"></div>

    {{-- Carte --}}
    <div id="editTechModalCard"
        class="relative w-full max-w-lg bg-background border border-primary/10 rounded-3xl shadow-2xl p-8 space-y-6
               translate-y-4 opacity-0 transition-all duration-300 ease-out max-h-[90vh] overflow-y-auto">

        {{-- En-tête --}}
        <div class="flex items-center justify-between">
            <div>
                <h2 id="editTechModalTitle" class="text-xl font-bold tracking-tight text-primary">Modifier la Technologie</h2>
                <p class="text-xs text-secondary mt-0.5">Mettez à jour les informations.</p>
            </div>
            <button type="button" onclick="closeEditTechModal()"
                class="flex items-center justify-center w-8 h-8 rounded-full bg-primary/5 hover:bg-primary/10 text-secondary hover:text-primary transition-colors">
                <span class="material-symbols-outlined text-base">close</span>
            </button>
        </div>

        {{-- Formulaire --}}
        <form id="editTechForm" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            {{-- Nom --}}
            <div class="space-y-1.5">
                <label class="text-xs font-bold uppercase tracking-wider text-secondary">Nom de la technologie</label>
                <input type="text" id="editTechNom" name="nom" required
                    class="w-full rounded-xl border border-primary/10 bg-primary/5 px-4 py-3 text-sm font-medium text-primary
                           outline-none focus:border-cta focus:ring-2 focus:ring-cta/10 transition-all">
            </div>

            {{-- Domaines --}}
            <div class="space-y-1.5">
                <label class="text-xs font-bold uppercase tracking-wider text-secondary">Domaines de compétence</label>
                <div class="grid grid-cols-2 gap-3 p-4 rounded-2xl bg-primary/5 border border-primary/10">
                    @foreach($domaines as $domaine)
                        <label class="flex items-center gap-2 cursor-pointer group">
                            <input type="checkbox" name="domaines[]" value="{{ $domaine->id }}"
                                data-domaine-id="{{ $domaine->id }}"
                                class="edit-domaine-checkbox w-4 h-4 rounded border-primary/20 text-cta focus:ring-cta">
                            <span class="text-xs font-medium text-secondary group-hover:text-cta transition-colors">{{ $domaine->nom }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            {{-- Actions --}}
            <div class="flex gap-3 pt-2">
                <button type="button" onclick="closeEditTechModal()"
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
