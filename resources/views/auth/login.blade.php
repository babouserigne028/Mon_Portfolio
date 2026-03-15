<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration — Connexion</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;500;600;700&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-background font-body flex items-center justify-center px-4 py-12 antialiased">

    <div class="w-full max-w-md">

        <!-- Logo -->
        <div class="text-center mb-8">
            <a href="{{ route('acceuil') }}" class="font-display text-5xl text-primary hover:text-cta transition-colors duration-[250ms] cursor-pointer">
                Serigne.
            </a>
            <p class="text-secondary text-sm mt-2">Espace administration</p>
        </div>

        <!-- Card -->
        <div class="bg-white rounded-2xl border border-primary/10 shadow-sm p-8">

            <div class="mb-6">
                <h1 class="font-display text-3xl text-primary">Connexion</h1>
                <p class="text-secondary text-sm mt-1">Accédez à votre tableau de bord.</p>
            </div>

            <form action="{{ route('login') }}" method="POST" class="flex flex-col gap-5">
                @csrf

                <div class="flex flex-col gap-1.5">
                    <label for="email" class="text-sm font-medium text-primary">Adresse email</label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        value="{{ old('email') }}"
                        required
                        autocomplete="email"
                        placeholder="admin@exemple.com"
                        class="w-full px-4 py-3 bg-background border border-primary/20 rounded-lg text-primary
                               focus:outline-none focus:ring-2 focus:ring-cta focus:border-transparent
                               transition-all duration-[250ms] placeholder:text-secondary/50 min-h-[44px]
                               @error('email') border-error @enderror" />
                    @error('email')
                        <p class="text-xs text-error font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col gap-1.5">
                    <label for="password" class="text-sm font-medium text-primary">Mot de passe</label>
                    <div class="relative">
                        <input
                            id="password"
                            name="password"
                            type="password"
                            required
                            autocomplete="current-password"
                            placeholder="••••••••"
                            class="w-full px-4 py-3 pr-12 bg-background border border-primary/20 rounded-lg text-primary
                                   focus:outline-none focus:ring-2 focus:ring-cta focus:border-transparent
                                   transition-all duration-[250ms] placeholder:text-secondary/50 min-h-[44px]
                                   @error('password') border-error @enderror" />
                        <button type="button" onclick="togglePassword()"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-secondary hover:text-primary transition-colors cursor-pointer">
                            <i id="eye-icon" data-lucide="eye" class="w-5 h-5"></i>
                        </button>
                    </div>
                    @error('password')
                        <p class="text-xs text-error font-medium">{{ $message }}</p>
                    @enderror
                </div>

                @if ($errors->any() && !$errors->has('email') && !$errors->has('password'))
                    <div class="px-4 py-3 rounded-lg bg-error/10 border border-error/20">
                        <p class="text-sm text-error font-medium">{{ $errors->first() }}</p>
                    </div>
                @endif

                <button
                    type="submit"
                    class="w-full py-4 bg-cta text-white rounded-lg hover:bg-cta/90 transition-all duration-300
                           font-semibold min-h-[44px] cursor-pointer flex items-center justify-center gap-2 mt-1">
                    <i data-lucide="log-in" class="w-5 h-5"></i>
                    Se connecter
                </button>

            </form>
        </div>

        <!-- Retour -->
        <div class="text-center mt-6">
            <a href="{{ route('acceuil') }}"
                class="text-sm text-secondary hover:text-primary transition-colors duration-[250ms] cursor-pointer inline-flex items-center gap-1">
                <i data-lucide="arrow-left" class="w-4 h-4"></i>
                Retour au portfolio
            </a>
        </div>

    </div>

    @vite('resources/js/auth/login.js')
</body>
</html>
