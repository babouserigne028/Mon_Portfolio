<section class="py-16 bg-primary text-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center reveal">

            <div>
                <p class="text-cta font-semibold mb-4">Travaillons ensemble</p>
                <h2 class="font-display text-4xl md:text-5xl mb-6 leading-tight">
                    Prêt à créer quelque chose d'extraordinaire ?
                </h2>
                <p class="text-white/70 leading-relaxed mb-8 max-w-md">
                    Actuellement disponible pour des missions freelance et des opportunités à temps plein.
                    N'hésitez pas à me contacter pour discuter de votre projet.
                </p>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 lg:justify-end">
                <a href="{{ route('contact') }}"
                    class="inline-flex items-center justify-center px-8 py-4 bg-cta text-white rounded-full hover:bg-cta/90 transition-all duration-300 cursor-pointer font-semibold min-h-[44px] shadow-lg shadow-cta/20">
                    <span>Me contacter</span>
                    <i data-lucide="mail" class="w-5 h-5 ml-2"></i>
                </a>
                <a href="{{ route('projets') }}"
                    class="inline-flex items-center justify-center px-8 py-4 border-2 border-white/20 text-white rounded-full hover:border-white/50 transition-all duration-300 cursor-pointer font-semibold min-h-[44px]">
                    Voir mes projets
                </a>
            </div>

        </div>
    </div>
</section>
