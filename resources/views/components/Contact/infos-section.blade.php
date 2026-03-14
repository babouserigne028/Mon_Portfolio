@props(['localisation', 'email'])
<div class="flex flex-col gap-8">

    <div>
        <p class="text-cta font-semibold mb-4">Contact</p>
        <h2 class="font-display text-4xl md:text-5xl mb-6 text-white leading-tight">
            Discutons de votre projet
        </h2>
        <p class="text-white/70 leading-relaxed mb-8 max-w-md">
            Vous avez un projet en tête ? N'hésitez pas à me contacter. Je serais ravi de discuter de vos idées
            et de voir comment je peux vous aider à les réaliser.
        </p>
    </div>

    <div class="flex flex-col gap-6">

        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center shrink-0">
                <i data-lucide="mail" class="w-5 h-5 text-white"></i>
            </div>
            <div>
                <p class="text-white/50 text-sm">Email</p>
                <a href="mailto:{{ $email }}"
                    class="text-white hover:text-cta transition-colors duration-[250ms] cursor-pointer font-medium">
                    {{ $email }}
                </a>
            </div>
        </div>

        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center shrink-0">
                <i data-lucide="map-pin" class="w-5 h-5 text-white"></i>
            </div>
            <div>
                <p class="text-white/50 text-sm">Localisation</p>
                <p class="text-white font-medium">{{ $localisation }}</p>
            </div>
        </div>

        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center shrink-0">
                <i data-lucide="clock" class="w-5 h-5 text-white"></i>
            </div>
            <div>
                <p class="text-white/50 text-sm">Disponibilité</p>
                <p class="text-white font-medium">Disponible pour de nouveaux projets</p>
            </div>
        </div>

    </div>

</div>
