@props(['technologies'])
<div class="reveal order-1 lg:order-2 flex flex-col gap-8">
    <div>
        <p class="text-cta font-semibold mb-4">À propos</p>
        <h2 class="font-display text-4xl md:text-5xl text-primary mb-6 leading-tight">
            Passionné par le code et l'innovation
        </h2>
        <div class="space-y-4 text-secondary leading-relaxed">
            <p>
                Développeur Web Full Stack passionné par la création d'applications web évolutives.
                Mon parcours a commencé par une curiosité pour le fonctionnement d'Internet, qui s'est
                transformée en une carrière axée sur le code propre, le design centré utilisateur et une
                architecture robuste.
            </p>
            <p>
                Je crois en l'apprentissage continu et je reste à jour sur les dernières tendances du secteur pour
                offrir les meilleurs résultats. Mon approche allie excellence technique et compréhension des
                objectifs business.
            </p>
            <p>
                Quand je ne code pas, je contribue à des projets open-source, je mentor des développeurs juniors ou
                j'explore de nouveaux modèles de design UI.
            </p>
        </div>
    </div>

    <!-- Skills -->
    <div>
        <h3 class="font-semibold text-primary mb-4">Technologies</h3>
        <div class="flex flex-wrap gap-3">
            @foreach ($technologies as $techno)
                <span class="px-4 py-2 bg-primary/5 text-primary rounded-full font-medium cursor-default
                             hover:bg-cta/10 hover:text-cta transition-colors duration-[250ms]">
                    {{ $techno->nom }}
                </span>
            @endforeach
        </div>
    </div>

    <!-- Quote -->
    <blockquote class="border-l-4 border-cta pl-4">
        <p class="text-secondary italic leading-relaxed">
            « Un code propre n'est pas seulement une norme ; c'est un engagement envers les développeurs futurs et
            l'expérience utilisateur. »
        </p>
    </blockquote>

    <!-- CTAs -->
    <div class="flex flex-wrap gap-4">
        <a href="{{ route('contact') }}"
            class="inline-flex items-center px-6 py-3 bg-cta text-white rounded-full hover:bg-cta/90 transition-all duration-300 cursor-pointer font-semibold min-h-[44px]">
            Me contacter
            <i data-lucide="arrow-right" class="w-5 h-5 ml-2"></i>
        </a>
        <a href="{{ route('projets') }}"
            class="inline-flex items-center px-6 py-3 border-2 border-primary text-primary rounded-full hover:bg-primary hover:text-white transition-all duration-300 cursor-pointer font-semibold min-h-[44px]">
            Mes projets
        </a>
    </div>
</div>
