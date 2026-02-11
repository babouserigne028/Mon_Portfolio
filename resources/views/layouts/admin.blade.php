<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Kingston.{{ $nom ?? 'Portfolio' }}</title>
    <!-- Google Fonts & Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3b82f6', // Remplace par ton code couleur exact si besoin
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        .active-link { @apply text-primary bg-primary/5 border-r-4 border-primary; }
    </style>
</head>
<body class="bg-slate-50/50 text-slate-900">

    <!-- Navbar identique à ton header -->
    <header class="fixed top-0 z-50 w-full border-b border-slate-200/60 bg-white/80 backdrop-blur-md px-6 py-4">
        <div class="flex items-center justify-between mx-auto">
            <div class="flex items-center gap-2">
                <div class="p-1.5 bg-primary rounded-lg text-white">
                    <span class="material-symbols-outlined block">terminal</span>
                </div>
                <h2 class="text-xl font-bold tracking-tight text-slate-900">
                    Kingston<span class="text-primary">.Admin</span>
                </h2>
            </div>
            <div class="flex items-center gap-4">
                <span class="text-sm font-bold text-slate-900">{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center gap-2 rounded-lg border border-slate-200 px-4 py-2 text-sm font-bold text-slate-600 hover:bg-slate-50 transition-all">
                        <span class="material-symbols-outlined text-sm">logout</span> Déconnexion
                    </button>
                </form>
            </div>
        </div>
    </header>

    <div class="flex pt-20">
        <!-- Sidebar Kingston -->
        <aside class="fixed left-0 w-64 h-full bg-white border-r border-slate-200/60 p-4">
            <nav class="flex flex-col gap-2">
                <p class="px-4 text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-2">Menu Principal</p>
                
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold transition-all {{ request()->routeIs('admin.dashboard') ? 'text-primary bg-primary/5' : 'text-slate-600 hover:bg-slate-50' }}">
                    <span class="material-symbols-outlined">dashboard</span> Dashboard
                </a>

                <p class="px-4 text-[10px] font-bold uppercase tracking-widest text-slate-400 mt-6 mb-2">Contenu</p>

                <a href="{{ route('admin.profil.edit') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold transition-all {{ request()->routeIs('admin.profil.*') ? 'text-primary bg-primary/5' : 'text-slate-600 hover:bg-slate-50' }}">
                    <span class="material-symbols-outlined">person</span> Mon Profil
                </a>

                <a href="{{ route('admin.projets.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold transition-all {{ request()->routeIs('admin.projets.*') ? 'text-primary bg-primary/5' : 'text-slate-600 hover:bg-slate-50' }}">
                    <span class="material-symbols-outlined">layers</span> Projets
                </a>

                <a href="{{ route('admin.technologies.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold transition-all {{ request()->routeIs('admin.technologies.*') ? 'text-primary bg-primary/5' : 'text-slate-600 hover:bg-slate-50' }}">
                    <span class="material-symbols-outlined">architecture</span> Technologies
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="ml-64 w-full p-8">
            @if(session('success'))
                <div class="mb-6 flex items-center gap-3 rounded-xl border border-emerald-100 bg-emerald-50/50 p-4 text-sm font-medium text-emerald-600">
                    <span class="material-symbols-outlined">check_circle</span>
                    {{ session('success') }}
                </div>
            @endif
            @yield('content')
        </main>
    </div>

</body>
</html>