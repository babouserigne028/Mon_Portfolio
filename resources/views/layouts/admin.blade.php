<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Kingston.{{ $nom ?? 'Portfolio' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;500;600;700&family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .active-link {
            border-right: 4px solid #2563EB;
            background-color: #2563EB0D;
            color: #2563EB;
        }
    </style>
</head>

<body class="bg-background text-primary font-body antialiased">

    <!-- Navbar — même style que le header utilisateur -->
    <nav class="fixed top-0 z-50 w-full bg-background/95 backdrop-blur-sm border-b border-primary/10" role="navigation"
        aria-label="Navigation administration">
        <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">

                <!-- Logo -->
                <a href="{{ route('admin.dashboard') }}"
                    class="font-display text-3xl text-primary hover:text-cta transition-colors duration-250 cursor-pointer"
                    aria-label="Dashboard Admin">
                    Rignsei.<span class="text-cta text-2xl">admin</span>
                </a>

                <!-- Infos utilisateur + déconnexion -->
                <div class="flex items-center space-x-6">
                    <span class="hidden md:block text-sm font-medium text-secondary">
                        {{ Auth::user()->prenom }} {{ Auth::user()->nom }}
                    </span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="flex items-center gap-2 px-6 py-3 bg-cta text-white rounded-full hover:bg-cta/90 transition-all duration-300 font-semibold min-h-11 text-sm cursor-pointer">
                            <span class="material-symbols-outlined text-base">logout</span>
                            Déconnexion
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </nav>

    <div class="flex pt-20">
        <!-- Sidebar -->
        <aside class="fixed left-0 w-64 h-full bg-background border-r border-primary/10 p-4">
            <nav class="flex flex-col gap-2">
                <p class="px-4 text-[10px] font-bold uppercase tracking-widest text-secondary/50 mb-2">Menu Principal
                </p>

                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold transition-all {{ request()->routeIs('admin.dashboard') ? 'text-cta bg-cta/5' : 'text-secondary hover:bg-primary/5' }}">
                    <span class="material-symbols-outlined">dashboard</span> Dashboard
                </a>

                <p class="px-4 text-[10px] font-bold uppercase tracking-widest text-secondary/50 mt-6 mb-2">Contenu</p>

                <a href="{{ route('admin.profil.edit') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold transition-all {{ request()->routeIs('admin.profil.*') ? 'text-cta bg-cta/5' : 'text-secondary hover:bg-primary/5' }}">
                    <span class="material-symbols-outlined">person</span> Mon Profil
                </a>

                <a href="{{ route('admin.projets.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold transition-all {{ request()->routeIs('admin.projets.*') ? 'text-cta bg-cta/5' : 'text-secondary hover:bg-primary/5' }}">
                    <span class="material-symbols-outlined">layers</span> Projets
                </a>

                <a href="{{ route('admin.technologies.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold transition-all {{ request()->routeIs('admin.technologies.*') ? 'text-cta bg-cta/5' : 'text-secondary hover:bg-primary/5' }}">
                    <span class="material-symbols-outlined">architecture</span> Technologies
                </a>

                <a href="{{ route('admin.domaines.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold transition-all {{ request()->routeIs('admin.domaines.*') ? 'text-cta bg-cta/5' : 'text-secondary hover:bg-primary/5' }}">
                    <span class="material-symbols-outlined">category</span> Domaines de Compétence
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="ml-64 w-full p-6">
            @if (session('success'))
                <div
                    class="mb-6 flex items-center gap-3 rounded-xl border border-success/20 bg-success/5 p-4 text-sm font-medium text-success">
                    <span class="material-symbols-outlined">check_circle</span>
                    {{ session('success') }}
                </div>
            @endif
            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>

</html>
