@extends('layouts.admin')

@section('admincontent')

<main class="flex-1 min-h-screen overflow-y-auto bg-slate-50">
    <header class="h-20 bg-white/80 backdrop-blur-md sticky top-0 z-30 px-8 flex items-center justify-between border-b border-slate-200">
        <div>
            <h1 class="text-2xl font-black text-slate-900 uppercase tracking-tighter">
                Nouveau <span class="text-blue-600 italic text-3xl">Membre</span>
            </h1>
        </div>
        <div class="flex items-center gap-2">
            <span class="h-2 w-2 bg-blue-600 rounded-full animate-pulse"></span>
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest italic">Recrutement BriefCode</p>
        </div>
    </header>

    <div class="p-8">
        <div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden">

            <div class="bg-slate-50/50 p-8 border-b border-slate-200">
                <p class="text-xs font-black text-blue-600 uppercase tracking-[0.2em] mb-1">Configuration d'accès</p>
                <h2 class="text-lg font-bold text-slate-600">Remplissez les informations d'identité du futur collaborateur.</h2>
            </div>

            <form method="POST" action="{{ route('users.store') }}" class="p-8 space-y-8">
                @csrf
                {{-- Message succès --}}
                @if(session('success'))
                    <div class="mb-4 p-4 rounded-lg bg-green-100 text-green-700 border border-green-200">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Message erreur --}}
                @if(session('error'))
                    <div class="mb-4 p-4 rounded-lg bg-red-100 text-red-700 border border-red-200">
                        {{ session('error') }}
                    </div>
                @endif
                
                {{-- Erreurs de validation --}}
                @if($errors->any())
                    <div class="mb-4 p-4 rounded-lg bg-red-100 text-red-700 border border-red-200">
                        <ul class="list-disc pl-5 space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                    {{-- Nom --}}
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-1 italic">Nom de famille</label>
                        <input type="text" name="nom" value="{{ old('nom') }}" required placeholder="ex: KERYO"
                            class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-slate-900 placeholder:text-slate-300 focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 outline-none transition-all">
                    </div>

                    {{-- Prénom --}}
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-1 italic">Prénom</label>
                        <input type="text" name="prenom" value="{{ old('prenom') }}" required placeholder="ex: Marc"
                            class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-slate-900 placeholder:text-slate-300 focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 outline-none transition-all">
                    </div>

                    {{-- Date de naissance --}}
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-1 italic">Date de naissance</label>
                        <input type="date" name="date_naissance" required
                            class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-slate-600 focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 outline-none transition-all">
                    </div>

                    {{-- CIN --}}
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-1 italic">N° Carte d'identité (CIN)</label>
                        <input type="text" name="cin" required placeholder="ex: AB123456"
                            class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-slate-900 placeholder:text-slate-300 focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 outline-none transition-all uppercase">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6 border-t border-slate-100 pt-8">
                    {{-- Téléphone --}}
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-1 italic">Téléphone Mobile</label>
                        <input type="tel" name="telephone" required placeholder="+212 ..."
                            class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-slate-900 placeholder:text-slate-300 focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 outline-none transition-all">
                    </div>

                    {{-- Email --}}
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-1 italic">Email Professionnel</label>
                        <input type="email" name="email" required placeholder="contact@briefcode.io"
                            class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-slate-900 placeholder:text-slate-300 focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 outline-none transition-all">
                    </div>

                    {{-- Rôle --}}
                    <div class="space-y-2 md:col-span-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-1 italic">Niveau de privilèges</label>
                        <select name="roles"
                            class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-slate-900 focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 outline-none transition-all appearance-none cursor-pointer">
                            <option value="admin">Administrateur (Accès total)</option>
                            <option value="editor">Formateur (Gestion contenu)</option>
                            <option value="client">Etudiant (Accès restreint)</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6 border-t border-slate-100 pt-8 pb-4">
                    {{-- Mot de passe --}}
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-1 italic">Clé d'accès</label>
                        <input type="password" name="password" required placeholder="••••••••"
                            class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-slate-900 placeholder:text-slate-300 focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 outline-none transition-all">
                    </div>

                    {{-- Confirmation mot de passe --}}
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-1 italic">Confirmer la clé</label>
                        <input type="password" name="password_confirmation" required placeholder="••••••••"
                            class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-slate-900 placeholder:text-slate-300 focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 outline-none transition-all">
                    </div>
                </div>

                {{-- BOUTONS D'ACTION --}}
                <div class="flex items-center justify-end gap-6 pt-8 border-t border-slate-100">
                    <a href="{{ route('users.index') }}"
                       class="text-xs font-black uppercase tracking-widest text-slate-400 hover:text-slate-900 transition-colors">
                        Abandonner
                    </a>

                    <button type="submit"
                        class="px-10 py-4 bg-slate-900 hover:bg-blue-600 text-white text-xs font-black uppercase tracking-[0.2em] rounded-xl shadow-lg shadow-slate-200 transition-all active:scale-95">
                        Déployer le membre
                    </button>
                </div>

            </form>
        </div>
    </div>
</main>

@endsection
