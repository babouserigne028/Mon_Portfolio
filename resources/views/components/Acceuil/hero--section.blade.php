@props(['prenom', 'nom', 'apropos', 'nbre_annee_experience', 'photo', 'lien_cv'])
<section id="accueil" class="min-h-screen flex items-center pt-20 relative overflow-hidden">

    <!-- Background decorative blurs -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-20 left-10 w-72 h-72 bg-cta/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-secondary/5 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
        <div class="grid lg:grid-cols-2 gap-12 items-center">

            <!-- Left: Text -->
            <div class="reveal">
                <p class="text-cta font-semibold mb-4 tracking-wide">Bonjour, je suis</p>
                <h1 class="font-display text-5xl md:text-7xl text-primary mb-6 leading-tight">
                    {{ $prenom }} {{ $nom }}
                </h1>
                <p class="text-xl md:text-2xl text-secondary mb-8 leading-relaxed max-w-xl font-body">
                    {{ $apropos ?? 'Développeur Web Full Stack passionné par la création d\'expériences digitales modernes et performantes.' }}
                </p>

                <!-- CTAs -->
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('projets') }}"
                        class="inline-flex items-center px-8 py-4 bg-cta text-white rounded-full hover:bg-cta/90 hover:scale-[1.02] transition-all duration-300 cursor-pointer font-semibold min-h-[44px] shadow-lg shadow-cta/20">
                        <span>Voir mes projets</span>
                        <i data-lucide="arrow-right" class="w-5 h-5 ml-2"></i>
                    </a>
                    @if($lien_cv)
                    <a href="{{ asset('storage/' . $lien_cv) }}" target="_blank" download
                        class="inline-flex items-center px-8 py-4 border-2 border-primary text-primary rounded-full hover:bg-primary hover:text-white transition-all duration-300 cursor-pointer font-semibold min-h-[44px]">
                        <i data-lucide="download" class="w-5 h-5 mr-2"></i>
                        Mon CV
                    </a>
                    @endif
                </div>

                <!-- Social links -->
                <div class="flex items-center space-x-4 mt-10">
                    <a href="https://github.com" target="_blank" rel="noopener noreferrer"
                        class="w-12 h-12 flex items-center justify-center rounded-full bg-primary/5 text-secondary hover:bg-cta hover:text-white transition-all duration-300 cursor-pointer"
                        aria-label="GitHub">
                        <i data-lucide="github" class="w-5 h-5"></i>
                    </a>
                    <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer"
                        class="w-12 h-12 flex items-center justify-center rounded-full bg-primary/5 text-secondary hover:bg-cta hover:text-white transition-all duration-300 cursor-pointer"
                        aria-label="LinkedIn">
                        <i data-lucide="linkedin" class="w-5 h-5"></i>
                    </a>
                    <a href="#contact"
                        class="w-12 h-12 flex items-center justify-center rounded-full bg-primary/5 text-secondary hover:bg-cta hover:text-white transition-all duration-300 cursor-pointer"
                        aria-label="Email">
                        <i data-lucide="mail" class="w-5 h-5"></i>
                    </a>
                </div>
            </div>

            <!-- Right: Photo -->
            <div class="reveal flex justify-center lg:justify-end">
                <div class="relative">
                    <!-- Photo card -->
                    <div class="w-72 h-72 md:w-96 md:h-96 rounded-3xl bg-gradient-to-br from-cta/20 to-secondary/20 overflow-hidden">
                        <img
                            src="{{ asset('storage/' . $photo) }}"
                            alt="Photo de {{ $prenom }} {{ $nom }}"
                            class="w-full h-full object-cover"
                            loading="eager" />
                    </div>
                    <!-- Decorative -->
                    <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-cta rounded-2xl -z-10"></div>
                    <div class="absolute -top-4 -left-4 w-16 h-16 border-4 border-secondary/30 rounded-xl -z-10"></div>
                    <!-- Stats overlay -->
                    @if($nbre_annee_experience)
                    <div class="absolute -bottom-8 -left-8 bg-white p-4 rounded-2xl shadow-xl hidden md:block">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="text-center">
                                <p class="font-display text-3xl text-cta">{{ $nbre_annee_experience }}+</p>
                                <p class="text-secondary text-xs">Ans d'exp.</p>
                            </div>
                            <div class="text-center">
                                <p class="font-display text-3xl text-cta">20+</p>
                                <p class="text-secondary text-xs">Projets</p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</section>
