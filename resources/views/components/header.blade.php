@props(['nom', 'prenom' => ''])
<nav class="fixed w-full bg-background/95 backdrop-blur-sm z-50 border-b border-primary/10"
     role="navigation"
     aria-label="Navigation principale">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">

            <!-- Logo -->
            <a href="{{ route('acceuil') }}"
                class="font-display text-3xl text-primary hover:text-cta transition-colors duration-[250ms] cursor-pointer"
                aria-label="Accueil">
                Rignsei.
            </a>

            <!-- Desktop Nav -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('acceuil') }}"
                    class="text-secondary hover:text-cta transition-colors duration-[250ms] cursor-pointer font-medium
                           {{ request()->routeIs('acceuil') ? 'text-cta' : '' }}">
                    Accueil
                </a>
                <a href="{{ route('projets') }}"
                    class="text-secondary hover:text-cta transition-colors duration-[250ms] cursor-pointer font-medium
                           {{ request()->routeIs('projets') ? 'text-cta' : '' }}">
                    Projets
                </a>
                <a href="{{ route('a_propos') }}"
                    class="text-secondary hover:text-cta transition-colors duration-[250ms] cursor-pointer font-medium
                           {{ request()->routeIs('a_propos') ? 'text-cta' : '' }}">
                    À propos
                </a>
                <a href="{{ route('contact') }}"
                    class="px-6 py-3 bg-cta text-white rounded-full hover:bg-cta/90 transition-all duration-300 cursor-pointer font-semibold min-h-[44px] flex items-center">
                    Contact
                </a>
            </div>

            <!-- Mobile menu button (44x44 touch target) -->
            <button id="mobile-menu-btn"
                class="md:hidden min-w-[44px] min-h-[44px] flex items-center justify-center text-primary cursor-pointer"
                aria-label="Ouvrir le menu"
                aria-expanded="false"
                aria-controls="mobile-menu">
                <i data-lucide="menu" class="w-6 h-6"></i>
            </button>
        </div>
    </div>

    <!-- Mobile menu -->
    <div id="mobile-menu"
        class="hidden md:hidden bg-background border-t border-primary/10"
        role="menu">
        <div class="px-4 py-6 space-y-4">
            <a href="{{ route('acceuil') }}"
                class="block py-3 text-secondary hover:text-cta transition-colors duration-[250ms] cursor-pointer font-medium
                       {{ request()->routeIs('acceuil') ? 'text-cta' : '' }}"
                role="menuitem">Accueil</a>
            <a href="{{ route('projets') }}"
                class="block py-3 text-secondary hover:text-cta transition-colors duration-[250ms] cursor-pointer font-medium
                       {{ request()->routeIs('projets') ? 'text-cta' : '' }}"
                role="menuitem">Projets</a>
            <a href="{{ route('a_propos') }}"
                class="block py-3 text-secondary hover:text-cta transition-colors duration-[250ms] cursor-pointer font-medium
                       {{ request()->routeIs('a_propos') ? 'text-cta' : '' }}"
                role="menuitem">À propos</a>
            <a href="{{ route('contact') }}"
                class="block py-3 text-cta font-semibold cursor-pointer"
                role="menuitem">Contact</a>
            <a href="{{ route('login') }}"
                class="block py-3 text-secondary hover:text-cta transition-colors duration-[250ms] cursor-pointer font-medium"
                role="menuitem">Administration</a>
        </div>
    </div>
</nav>
