@extends('layouts.admin')

@section('admincontent')

<main class="flex-1 min-h-screen overflow-y-auto bg-slate-50">
    {{-- BARRE DE NAVIGATION FIXE --}}
    <header class="h-20 bg-white/80 backdrop-blur-md sticky top-0 z-30 px-8 flex items-center justify-between border-b border-slate-200">
        <div class="flex items-center gap-4">
            <a href="{{ route('users.index') }}" class="p-2 hover:bg-slate-100 rounded-full transition-colors group">
                <svg class="w-5 h-5 text-slate-400 group-hover:text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"/></svg>
            </a>
            <h1 class="text-2xl font-black text-slate-900 uppercase tracking-tighter">
                Modifier <span class="text-amber-500 italic text-3xl">Profil</span>
            </h1>
        </div>
        <div class="flex items-center gap-2 text-right">
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest italic">Membre ID: #{{ $user->id }}</p>
            <span class="h-2 w-2 bg-amber-500 rounded-full"></span>
        </div>
    </header>

    <div class="p-8">
        <div class="max-w-4xl mx-auto bg-white rounded-[2.5rem] shadow-sm border border-slate-200 overflow-hidden">

            {{-- BANNIÈRE DE PROFIL --}}
            <div class="bg-slate-900 p-10 flex items-center gap-8 relative overflow-hidden">
                <div class="relative z-10 h-24 w-24 rounded-3xl bg-amber-500 flex items-center justify-center text-white text-4xl font-black italic shadow-2xl">
                    {{ substr($user->prenom, 0, 1) }}{{ substr($user->nom, 0, 1) }}
                </div>
                <div class="relative z-10">
                    <h2 class="text-2xl font-black text-white uppercase tracking-tighter italic">{{ $user->prenom }} {{ $user->nom }}</h2>
                    <p class="text-amber-500 text-xs font-black uppercase tracking-widest mt-1 italic">{{ $user->roles ?? 'Utilisateur' }}</p>
                </div>
                {{-- Déco fond --}}
                <svg class="absolute right-[-5%] bottom-[-20%] w-64 h-64 text-white/5 opacity-10" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L1 21h22L12 2zm0 3.45l8.15 14.1H3.85L12 5.45z"/></svg>
            </div>

            <form method="POST" action="{{ route('users.update', $user->id) }}" class="p-10 space-y-10">
                @csrf
                @method('PUT')

                @if($errors->any())
                    <div class="p-4 rounded-2xl bg-red-50 text-red-600 border border-red-100 text-sm font-bold italic">
                        ⚠️ Veuillez corriger les erreurs dans le formulaire.
                    </div>
                @endif

                {{-- SECTION 1 : IDENTITÉ --}}
                <div class="space-y-6">
                    <div class="flex items-center gap-4">
                        <span class="w-1.5 h-6 bg-amber-500 rounded-full"></span>
                        <h3 class="text-xs font-black uppercase tracking-widest text-slate-900 italic">Informations d'identité</h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-1 italic">Nom</label>
                            <input type="text" name="nom" value="{{ old('nom', $user->nom) }}" required
                                class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 text-slate-900 focus:bg-white focus:ring-4 focus:ring-amber-500/10 focus:border-amber-500 outline-none transition-all font-bold italic shadow-inner">
                        </div>

                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-1 italic">Prénom</label>
                            <input type="text" name="prenom" value="{{ old('prenom', $user->prenom) }}" required
                                class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 text-slate-900 focus:bg-white focus:ring-4 focus:ring-amber-500/10 focus:border-amber-500 outline-none transition-all font-bold italic shadow-inner">
                        </div>

                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-1 italic">Date de naissance</label>
                            <input type="date" name="date_naissance" value="{{ old('date_naissance', $user->date_naissance) }}" required
                                class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 text-slate-600 focus:bg-white focus:ring-4 focus:ring-amber-500/10 focus:border-amber-500 outline-none transition-all font-bold shadow-inner">
                        </div>

                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-1 italic">CIN</label>
                            <input type="text" name="cin" value="{{ old('cin', $user->cin) }}" required
                                class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 text-slate-900 focus:bg-white focus:ring-4 focus:ring-amber-500/10 focus:border-amber-500 outline-none transition-all font-black uppercase shadow-inner">
                        </div>
                    </div>
                </div>

                {{-- SECTION 2 : CONTACT & ACCÈS --}}
                <div class="space-y-6 pt-6 border-t border-slate-100">
                    <div class="flex items-center gap-4">
                        <span class="w-1.5 h-6 bg-amber-500 rounded-full"></span>
                        <h3 class="text-xs font-black uppercase tracking-widest text-slate-900 italic">Coordonnées & Privilèges</h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-1 italic">Téléphone</label>
                            <input type="tel" name="telephone" value="{{ old('telephone', $user->telephone) }}" required
                                class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 text-slate-900 focus:bg-white focus:ring-4 focus:ring-amber-500/10 focus:border-amber-500 outline-none transition-all font-bold shadow-inner">
                        </div>

                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-1 italic">Email</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                                class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 text-slate-900 focus:bg-white focus:ring-4 focus:ring-amber-500/10 focus:border-amber-500 outline-none transition-all font-bold shadow-inner">
                        </div>

                        <div class="space-y-2 md:col-span-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-1 italic">Rôle Système</label>
                            <select name="roles" class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 text-slate-900 focus:bg-white focus:ring-4 focus:ring-amber-500/10 focus:border-amber-500 outline-none transition-all font-black uppercase tracking-tighter appearance-none cursor-pointer shadow-inner italic">
                                <option value="admin" {{ $user->hasRole('admin') ? 'selected' : '' }}>Administrateur</option>
                                <option value="teacher" {{ $user->hasRole('teacher') ? 'selected' : '' }}>Formateur</option>
                                <option value="student" {{ $user->hasRole('student') ? 'selected' : '' }}>Etudiant</option>
                            </select>
                        </div>
                    </div>
                </div>
                {{-- SECTION 3 : SÉCURITÉ --}}
                <div class="bg-amber-50 rounded-[2rem] p-8 border border-amber-100">
                    <div class="flex items-center gap-3 mb-4">
                        <svg class="w-5 h-5 text-amber-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <p class="text-xs font-black text-amber-700 uppercase tracking-widest italic">Sécurité</p>
                    </div>
                    <p class="text-xs text-amber-600 font-medium italic mb-6 leading-relaxed">Laissez les champs de mot de passe vides si vous ne souhaitez pas les modifier.</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <input type="password" name="password" placeholder="Nouveau mot de passe"
                            class="w-full bg-white/50 border border-amber-200 rounded-xl px-4 py-3 text-sm focus:ring-4 focus:ring-amber-500/10 focus:border-amber-500 outline-none transition-all italic">
                        <input type="password" name="password_confirmation" placeholder="Confirmer mot de passe"
                            class="w-full bg-white/50 border border-amber-200 rounded-xl px-4 py-3 text-sm focus:ring-4 focus:ring-amber-500/10 focus:border-amber-500 outline-none transition-all italic">
                    </div>
                </div>

                {{-- FOOTER ACTIONS --}}
                <div class="flex items-center justify-end gap-6 pt-10">
                    <a href="{{ route('users.index') }}" class="text-[10px] font-black uppercase tracking-widest text-slate-400 hover:text-slate-900 transition-colors italic underline underline-offset-4 decoration-slate-200">
                        Abandonner
                    </a>

                    <button type="submit" class="px-12 py-5 bg-slate-900 hover:bg-amber-500 text-white text-[10px] font-black uppercase tracking-[0.2em] rounded-2xl shadow-2xl shadow-amber-900/10 transition-all active:scale-95 group flex items-center gap-3">
                        Appliquer les changements
                        <svg class="w-4 h-4 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M4 12l8-8m0 0l8 8m-8-8v18"/></svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

@endsection
