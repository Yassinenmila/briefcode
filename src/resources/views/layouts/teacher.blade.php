<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Utilisateurs - Nova Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 flex">

    <aside class="w-64 bg-slate-900 h-screen sticky top-0 text-slate-300 flex flex-col hidden md:flex">
        <div class="p-6">
    <a href="#" class="group flex items-center gap-3 no-underline">
        <div class="relative">
            <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-indigo-500 rounded-lg blur opacity-25 group-hover:opacity-100 transition duration-300"></div>
            <div class="relative bg-slate-900 border border-slate-700 p-2 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400 group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                </svg>
            </div>
        </div>

        <div class="flex flex-col">
            <span class="text-2xl font-black tracking-tighter text-white leading-none">
                BRIEF<span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-indigo-400">CODE</span>
            </span>
            <div class="h-1 w-0 group-hover:w-full bg-blue-500 transition-all duration-300 rounded-full mt-1"></div>
        </div>
    </a>
</div>
        <nav class="flex-1 px-4 space-y-2 mt-4">
            <a href="{{ route('teacher.classes.index') }}" class="flex items-center gap-3 px-4 py-3 hover:bg-slate-800 hover:text-white rounded-xl transition-all">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2.586.75l-.75-.75A3.586.586.586.586.586.586.586.586.586.586.586.586.586.586.586.586.586.586.586z"/></svg>
                Classes
            </a>
            <a href="{{ route('teacher.sprints.index') }}" class="flex items-center gap-3 px-4 py-3 hover:bg-slate-800 hover:text-white rounded-xl transition-all">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2.586.75l-.75-.75A3.586.586.586.586.586.586.586.586.586.586.586.586.586.586.586.586.586.586.586z"/></svg>
                Sprints
            </a>
        </nav>

            <a href="{{ route('logout') }}" class="flex items-center gap-3 px-4 py-3 hover:bg-slate-800 hover:text-white rounded-xl transition-all">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                Se déconnecter
            </a>

    </aside>

    @yield('teachercontent')

    </body>
</html>
