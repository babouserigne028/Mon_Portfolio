@props(['projets'])
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach ($projets as $projet)
        <article class="reveal group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-[400ms] cursor-pointer border border-primary/5">

            <div class="relative aspect-video overflow-hidden">
                <img
                    src="{{ asset('storage/' . $projet->image_couverture) }}"
                    alt="{{ $projet->nom }}"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-[400ms]"
                    loading="lazy" />
                <!-- Overlay -->
                <div class="absolute inset-0 bg-primary/80 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center gap-4">
                    <a href="{{ route('projets') }}"
                        class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-primary hover:bg-cta hover:text-white transition-colors duration-[250ms] cursor-pointer"
                        aria-label="Voir le projet">
                        <i data-lucide="external-link" class="w-5 h-5"></i>
                    </a>
                    @if($projet->lien_github ?? false)
                    <a href="{{ $projet->lien_github }}" target="_blank" rel="noopener noreferrer"
                        class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-primary hover:bg-cta hover:text-white transition-colors duration-[250ms] cursor-pointer"
                        aria-label="Voir le code source">
                        <i data-lucide="github" class="w-5 h-5"></i>
                    </a>
                    @endif
                </div>
            </div>

            <div class="p-6">
                <h3 class="font-semibold text-xl text-primary mb-2">{{ $projet->nom }}</h3>
                <p class="text-secondary mb-4 leading-relaxed line-clamp-2">{{ $projet->description }}</p>
                <div class="flex flex-wrap gap-2">
                    @foreach ($projet->technologies as $techno)
                        <span class="px-3 py-1 bg-cta/10 text-cta text-sm rounded-full font-medium">{{ $techno->nom }}</span>
                    @endforeach
                </div>
            </div>

        </article>
    @endforeach
</div>
