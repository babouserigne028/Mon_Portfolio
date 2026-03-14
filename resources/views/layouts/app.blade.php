<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serigne Abdoulaye Babou | Portfolio</title>
    <link rel="icon" type="image/png" href="{{ asset('android-chrome-192x192.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;500;600;700&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body id="top" class="bg-background text-primary font-body antialiased">
    <!-- Skip link (accessibility) -->
    <a href="#main-content"
        class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 bg-cta text-white px-4 py-2 rounded-lg z-[100]">
        Aller au contenu principal
    </a>
    <div class="relative flex min-h-screen flex-col overflow-x-hidden">
        <main id="main-content" class="flex-1">
            @yield('content')
        </main>
    </div>
</body>
</html>
