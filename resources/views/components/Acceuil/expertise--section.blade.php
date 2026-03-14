@props(['domaines'])
<section id="expertise" class="py-16 bg-primary/[0.02]">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-16 reveal">
            <p class="text-cta font-semibold mb-4">Expertise</p>
            <h2 class="font-display text-4xl md:text-5xl text-primary mb-4">
                Domaines de compétence
            </h2>
            <p class="text-secondary max-w-2xl mx-auto leading-relaxed">
                Les technologies et domaines dans lesquels j'excelle pour livrer des solutions performantes.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($domaines as $domaine)
                <div class="reveal group bg-white rounded-2xl p-7 border border-primary/10 shadow-sm hover:shadow-xl transition-all duration-[400ms] cursor-default">

                    <!-- Icon -->
                    <div class="inline-flex p-3 rounded-xl w-fit mb-5"
                         style="background-color: {{ $domaine->couleur ?? '#2563EB' }}20; color: {{ $domaine->couleur ?? '#2563EB' }};">
                        <span class="material-symbols-outlined text-[26px] leading-none">{{ $domaine->icone ?: 'category' }}</span>
                    </div>

                    <h3 class="font-semibold text-xl text-primary mb-2">{{ $domaine->nom }}</h3>
                    <p class="text-secondary leading-relaxed mb-4">{{ $domaine->description }}</p>

                    @if($domaine->technologies && $domaine->technologies->count())
                    <div class="flex flex-wrap gap-2 mt-auto pt-4 border-t border-primary/5">
                        @foreach($domaine->technologies->take(4) as $techno)
                            <span class="px-3 py-1 bg-cta/10 text-cta text-sm rounded-full font-medium">{{ $techno->nom }}</span>
                        @endforeach
                        @if($domaine->technologies->count() > 4)
                            <span class="px-3 py-1 bg-primary/5 text-secondary text-sm rounded-full font-medium">+{{ $domaine->technologies->count() - 4 }}</span>
                        @endif
                    </div>
                    @endif

                </div>
            @endforeach
        </div>
    </div>
</section>
