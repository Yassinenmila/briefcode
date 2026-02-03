<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion / Inscription Professionnelle</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Styles pour l'effet Glassmorphism */
        .glass-container {
            background: rgba(255, 255, 255, 0.2); /* Fond semi-transparent */
            backdrop-filter: blur(10px); /* Effet de flou derrière */
            -webkit-backdrop-filter: blur(10px); /* Compatibilité Safari */
            border: 1px solid rgba(255, 255, 255, 0.3); /* Bordure subtile */
            border-radius: 1.5rem; /* Coins arrondis plus prononcés */
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.1); /* Ombre douce */
        }
        /* Gradient de fond pour le corps */
        body {
            background-image: linear-gradient(135deg, #f0f4f8 0%, #e2e8f0 100%);
        }
        /* Custom scrollbar pour les navigateurs basés sur Webkit */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
</head>
<body class="font-sans antialiased flex items-center justify-center min-h-screen p-6 overflow-hidden">
    <div class="flex flex-col md:flex-row bg-white rounded-3xl shadow-2xl overflow-hidden max-w-6xl w-full">
        <div class="md:w-1/2 bg-blue-500 relative hidden md:block">
            <img src="https://imgs.search.brave.com/SHuno7lXnUZKybndBnwjACScp4i_8yH-ODgkG9IjNdE/rs:fit:500:0:1:0/g:ce/aHR0cHM6Ly9pbWFn/ZXMucGV4ZWxzLmNv/bS9waG90b3MvMTU5/NzQwL2xpYnJhcnkt/bGEtdHJvYmUtc3R1/ZHktc3R1ZGVudHMt/MTU5NzQwLmpwZWc_/YXV0bz1jb21wcmVz/cyZjcz10aW55c3Jn/YiZkcHI9MSZ3PTUw/MA"  alt="Équipe professionnelle en réunion" class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-blue-900/50 to-transparent"></div>
            <div class="relative p-10 flex flex-col justify-end h-full text-white">
                <h3 class="text-3xl font-bold mb-4 leading-tight">Gérez votre avenir.</h3>
                <p class="text-lg opacity-90">
                    Notre plateforme vous aide à optimiser votre productivité et à collaborer efficacement.
                </p>
            </div>
        </div>
        <div class="md:w-1/2 p-8 md:p-12 flex flex-col justify-center glass-container relative z-10">
            <div class="flex justify-center mb-6">
                <div class="bg-blue-600 p-3 rounded-xl shadow-xl shadow-blue-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.21a2 2 0 011.085 2.766l-2.216 5.86a2 2 0 01-1.802 1.34l-5.875 1.56a2 2 0 01-2.766-1.085L2.382 6.834a2 2 0 011.085-2.766l2.216-5.86a2 2 0 011.802-1.34l5.875-1.56a2 2 0 012.766 1.085z" />
                    </svg>
                </div>
            </div>
            <div class="text-center mb-8">
                <h2 id="form-title" class="text-3xl font-extrabold text-gray-800 tracking-tight">Bienvenue</h2>
                <p id="form-subtitle" class="text-gray-600 mt-2">Accédez à votre espace professionnel</p>
            </div>
            <form method="POST" action="/login" class="space-y-6">
                @csrf
                @if($errors->any())
                    <div style="color:red;">
                        {{ $errors->first() }}
                    </div>
                @endif
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Adresse e-mail</label>
                    <input name="email" type="email" id="email" placeholder="nom@entreprise.com" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all duration-200 bg-white/70">
                </div>
                <div>
                    <div class="flex justify-between items-center mb-1">
                        <label for="password" class="text-sm font-semibold text-gray-700">Mot de passe</label>
                        <a href="#" id="forgot-pw" class="text-xs font-medium text-blue-600 hover:text-blue-700 hover:underline">Mot de passe oublié ?</a>
                    </div>
                    <input name="password" type="password" id="password" placeholder="••••••••" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all duration-200 bg-white/70">
                </div>
                <button type="submit" id="submit-btn" class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-bold py-3 rounded-lg shadow-lg shadow-blue-200 transition-all duration-200 active:scale-[0.99] transform">
                    Se connecter
                </button>
            </form>
            </div>
        </div>
    </div>
</body>
</html>