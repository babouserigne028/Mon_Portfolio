@props(['technologies'])
<div class="mb-14 reveal">

    <div class="text-center mb-10">
        <p class="text-cta font-semibold mb-4">Portfolio</p>
        <h1 class="font-display text-4xl md:text-5xl text-primary mb-4">
            Galerie de Projets
        </h1>
        <p class="text-secondary max-w-2xl mx-auto leading-relaxed">
            Une sélection soignée de modèles d'architecture, d'outils open-source et d'applications
            professionnelles que j'ai conçus de A à Z.
        </p>
    </div>

    <!-- Filtres -->
    <div class="flex gap-2.5 flex-wrap justify-center">
        <a href="{{ url('/projet') }}"
            class="px-5 py-2 rounded-full text-sm font-semibold transition-colors duration-[250ms] cursor-pointer min-h-[44px] flex items-center
                {{ empty(request('techno')) ? 'bg-cta text-white shadow-sm shadow-cta/20' : 'bg-white border border-primary/20 text-secondary hover:border-cta hover:text-cta' }}">
            Tous
        </a>
        @foreach ($technologies as $techno)
            <a href="{{ url('/projet?techno=' . urlencode($techno->nom)) }}"
                class="px-5 py-2 rounded-full text-sm font-semibold transition-colors duration-[250ms] cursor-pointer min-h-[44px] flex items-center
                    {{ request('techno') === $techno->nom ? 'bg-cta text-white shadow-sm shadow-cta/20' : 'bg-white border border-primary/20 text-secondary hover:border-cta hover:text-cta' }}">
                {{ $techno->nom }}
            </a>
        @endforeach
    </div>

</div>
