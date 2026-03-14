@props(['utilisateur'])
<div class="reveal order-2 lg:order-1">
    <div class="relative">
        <!-- About image placeholder (we don't have a second photo) -->
        <div
            class="aspect-[4/5] rounded-3xl overflow-hidden bg-gradient-to-br from-cta/10 to-secondary/10 flex items-center justify-center">
            <div class="text-center p-8">
                <div
                    class="w-20 h-20 rounded-full bg-cta/20 flex items-center justify-center mx-auto mb-4 overflow-hidden">
                    @if ($utilisateur && $utilisateur->photo)
                        <img src="{{ asset('storage/' . $utilisateur->photo) }}" alt="Photo de profil"
                            class="w-20 h-20 object-cover rounded-full">
                    @else
                        <i data-lucide="user" class="w-10 h-10 text-cta"></i>
                    @endif
                </div>
                <p class="font-display text-4xl text-primary">{{ $utilisateur->prenom ?? 'Utilisateur' }}.</p>
            </div>
        </div>
        <!-- Stats card -->
        <div class="absolute -bottom-8 -right-8 bg-white p-6 rounded-2xl shadow-xl hidden lg:block">
            <div class="grid grid-cols-2 gap-6">
                <div class="text-center">
                    <p class="font-display text-4xl text-cta">5+</p>
                    <p class="text-secondary text-sm">Années d'exp.</p>
                </div>
                <div class="text-center">
                    <p class="font-display text-4xl text-cta">20+</p>
                    <p class="text-secondary text-sm">Projets</p>
                </div>
            </div>
        </div>
    </div>
</div>
