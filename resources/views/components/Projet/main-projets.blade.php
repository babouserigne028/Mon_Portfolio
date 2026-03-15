@props(['projets'])
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach ($projets as $projet)
        <article
            class="reveal group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-[400ms] border border-primary/5 cursor-pointer"
            onclick="openProjetModal('{{ $projet->id }}')"
        >
            <div class="relative aspect-video overflow-hidden">
                <img
                    src="{{ asset('storage/' . $projet->image_couverture) }}"
                    alt="{{ $projet->nom }}"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-[400ms]"
                    loading="lazy" />
                <div class="absolute inset-0 bg-primary/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                    <span class="px-5 py-2.5 bg-white text-primary text-sm font-semibold rounded-full flex items-center gap-2 shadow-md">
                        <i data-lucide="eye" class="w-4 h-4"></i>
                        Voir le projet
                    </span>
                </div>
            </div>

            <div class="p-6 flex flex-col gap-4">
                <div>
                    <h3 class="font-semibold text-xl text-primary mb-2">{{ $projet->nom }}</h3>
                    <p class="text-secondary leading-relaxed line-clamp-2 text-sm">{{ $projet->description }}</p>
                </div>

                <div class="flex flex-wrap gap-2">
                    @foreach ($projet->technologies as $techno)
                        <span class="px-3 py-1 bg-cta/10 text-cta text-xs rounded-full font-medium">{{ $techno->nom }}</span>
                    @endforeach
                </div>

                <button
                    type="button"
                    class="self-start text-cta text-sm font-semibold flex items-center gap-1 hover:gap-2 transition-all duration-[250ms] cursor-pointer"
                    onclick="openProjetModal('{{ $projet->id }}'); event.stopPropagation();"
                >
                    Lire plus
                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </button>
            </div>
        </article>

        <!-- Modal projet -->
        <div
            id="modal-{{ $projet->id }}"
            class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-primary/60 backdrop-blur-sm"
            onclick="closeProjetModal('{{ $projet->id }}')"
        >
            <div
                class="bg-white rounded-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto shadow-2xl"
                onclick="event.stopPropagation()"
            >
                <div class="relative aspect-video overflow-hidden rounded-t-2xl">
                    <img
                        src="{{ asset('storage/' . $projet->image_couverture) }}"
                        alt="{{ $projet->nom }}"
                        class="w-full h-full object-cover"
                    />
                    <button
                        type="button"
                        class="absolute top-4 right-4 w-9 h-9 bg-white/90 hover:bg-white rounded-full flex items-center justify-center text-primary transition-colors duration-[250ms] cursor-pointer shadow-md"
                        onclick="closeProjetModal('{{ $projet->id }}')"
                        aria-label="Fermer"
                    >
                        <i data-lucide="x" class="w-5 h-5"></i>
                    </button>
                </div>

                <div class="p-8">
                    <h2 class="font-display text-3xl text-primary mb-1">{{ $projet->nom }}</h2>

                    @if($projet->technologies->isNotEmpty())
                        <div class="flex flex-wrap gap-2 mb-5">
                            @foreach ($projet->technologies as $techno)
                                <span class="px-3 py-1 bg-cta/10 text-cta text-sm rounded-full font-medium">{{ $techno->nom }}</span>
                            @endforeach
                        </div>
                    @endif

                    <p class="text-secondary leading-relaxed whitespace-pre-line mb-6">{{ $projet->description }}</p>

                    @if($projet->lien_projet)
                        <a
                            href="{{ $projet->lien_projet }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="inline-flex items-center gap-2 px-5 py-2.5 bg-cta text-white rounded-lg text-sm font-semibold hover:bg-cta/90 transition-colors duration-[250ms]"
                        >
                            <i data-lucide="external-link" class="w-4 h-4"></i>
                            Voir le projet
                        </a>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>

<script>
function openProjetModal(id) {
    const modal = document.getElementById('modal-' + id);
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.classList.add('overflow-hidden');
}

function closeProjetModal(id) {
    const modal = document.getElementById('modal-' + id);
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    document.body.classList.remove('overflow-hidden');
}

document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        document.querySelectorAll('[id^="modal-"]').forEach(modal => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        });
        document.body.classList.remove('overflow-hidden');
    }
});
</script>
