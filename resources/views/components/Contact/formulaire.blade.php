<div class="bg-white/5 backdrop-blur-sm rounded-2xl p-8">
    <form action="#" method="POST" class="flex flex-col gap-6">
        @csrf

        <div class="grid md:grid-cols-2 gap-6">
            <div class="flex flex-col gap-2">
                <label for="nom" class="text-sm font-medium text-white">Nom complet</label>
                <input
                    id="nom"
                    name="nom"
                    type="text"
                    required
                    placeholder="Votre nom"
                    class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white
                           focus:outline-none focus:ring-2 focus:ring-cta focus:border-transparent
                           transition-all duration-[250ms] placeholder:text-white/40 min-h-[44px]" />
            </div>
            <div class="flex flex-col gap-2">
                <label for="email" class="text-sm font-medium text-white">Email</label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    required
                    placeholder="votre@email.com"
                    class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white
                           focus:outline-none focus:ring-2 focus:ring-cta focus:border-transparent
                           transition-all duration-[250ms] placeholder:text-white/40 min-h-[44px]" />
            </div>
        </div>

        <div class="flex flex-col gap-2">
            <label for="sujet" class="text-sm font-medium text-white">Sujet</label>
            <input
                id="sujet"
                name="sujet"
                type="text"
                required
                placeholder="Sujet de votre message"
                class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white
                       focus:outline-none focus:ring-2 focus:ring-cta focus:border-transparent
                       transition-all duration-[250ms] placeholder:text-white/40 min-h-[44px]" />
        </div>

        <div class="flex flex-col gap-2">
            <label for="message" class="text-sm font-medium text-white">Message</label>
            <textarea
                id="message"
                name="message"
                rows="5"
                required
                placeholder="Décrivez votre projet..."
                class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white
                       focus:outline-none focus:ring-2 focus:ring-cta focus:border-transparent
                       transition-all duration-[250ms] resize-none placeholder:text-white/40"></textarea>
        </div>

        <button
            type="submit"
            class="w-full py-4 bg-cta text-white rounded-lg hover:bg-cta/90 transition-all duration-300
                   font-semibold min-h-[44px] cursor-pointer flex items-center justify-center gap-2">
            <span>Envoyer le message</span>
            <i data-lucide="send" class="w-5 h-5"></i>
        </button>

    </form>
</div>
