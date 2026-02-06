@extends('layouts.admin')

@section('admincontent')
    <div class="max-w-4xl mx-auto py-8">

        <div class="bg-white rounded-[2rem] p-8 md:p-12 shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-slate-100 mb-8 relative overflow-hidden">
            <div class="relative z-10">
                <div class="flex items-center gap-3 mb-6">
                    <span class="bg-indigo-600 text-white text-[10px] font-black px-4 py-1.5 rounded-full uppercase tracking-widest">
                        Gestion Agile
                    </span>
                    <span class="h-1.5 w-1.5 rounded-full bg-slate-200"></span>
                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest italic text-sm">Sprint Runner</span>
                </div>
                <h1 class="text-4xl md:text-5xl font-black text-slate-900 uppercase tracking-tighter italic mb-4">
                    Nouveau <span class="text-indigo-600">Sprint</span>
                </h1>
                <p class="text-slate-500 font-medium max-w-md italic">Configurez l'itération et ciblez les compétences à valider.</p>
            </div>
            <div class="absolute right-0 top-0 h-full w-1/3 bg-gradient-to-br from-indigo-500 to-purple-600 opacity-10 rounded-l-[5rem]"></div>
        </div>

        <form class="space-y-8" method="POST" action="{{ route('sprints.store') }}">
            @csrf

            <div class="bg-white rounded-[2rem] p-8 md:p-12 shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-slate-100">

                <div class="flex items-center gap-4 mb-10 pb-4 border-b border-slate-50">
                    <span class="w-1.5 h-6 bg-indigo-600 rounded-full"></span>
                    <h2 class="text-sm font-black uppercase tracking-widest text-slate-900">Paramètres du Sprint</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    {{-- Titre --}}
                    <div class="space-y-2 md:col-span-2">
                        <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1 italic">Titre du Sprint</label>
                        <input name="title" type="text" placeholder="ex: SPRINT 01 - FONDATIONS LARAVEL"
                            class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-slate-900 placeholder:text-slate-300 focus:ring-2 focus:ring-indigo-600 outline-none transition-all font-bold uppercase italic shadow-inner">
                    </div>

                    {{-- Description --}}
                    <div class="space-y-2 md:col-span-2">
                        <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1 italic">Objectifs de l'itération</label>
                        <textarea name="description" rows="3" placeholder="Quels sont les livrables attendus ?"
                            class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-slate-900 placeholder:text-slate-300 focus:ring-2 focus:ring-indigo-600 outline-none transition-all font-medium shadow-inner"></textarea>
                    </div>

                    {{-- Date Début --}}
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1 italic">Lancement</label>
                        <input name="start_date" type="date"
                            class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-slate-900 focus:ring-2 focus:ring-indigo-600 outline-none transition-all font-bold shadow-inner">
                    </div>

                    {{-- Date Fin --}}
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1 italic">Deadline</label>
                        <input name="end_date" type="date"
                            class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-slate-900 focus:ring-2 focus:ring-indigo-600 outline-none transition-all font-bold shadow-inner border-l-4 border-red-100">
                    </div>
                </div>

                <div class="flex items-center gap-4 mt-16 mb-8 pb-4 border-b border-slate-50">
                    <span class="w-1.5 h-6 bg-indigo-600 rounded-full"></span>
                    <h2 class="text-sm font-black uppercase tracking-widest text-slate-900">Compétences ciblées</h2>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    {{-- Simulation de liste de compétences (Checkbox stylées) --}}
                    {{-- @foreach(['Architecture MVC', 'Gestion de Base de données', 'API Authentification', 'UI/UX Design', 'Tests Unitaires', 'Déploiement CI/CD'] as $skill)
                    <label class="group relative flex items-center p-4 bg-slate-50 rounded-2xl cursor-pointer hover:bg-indigo-50 transition-all border border-transparent hover:border-indigo-100">
                        <input type="checkbox" name="competences[]" value="{{ $skill }}" class="hidden peer">
                        <div class="w-5 h-5 rounded-lg border-2 border-slate-200 flex items-center justify-center peer-checked:bg-indigo-600 peer-checked:border-indigo-600 transition-all">
                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <span class="ml-4 text-[11px] font-black uppercase tracking-tighter text-slate-500 group-hover:text-indigo-900 transition-colors italic">
                            {{ $skill }}
                        </span>
                    </label>
                    @endforeach --}}
                </div>

                <div class="flex items-center justify-end gap-6 mt-16 pt-8 border-t border-slate-100">
                    <button type="button" class="text-[10px] font-black uppercase tracking-widest text-slate-400 hover:text-red-500 transition-all">
                        Réinitialiser
                    </button>

                    <button type="submit" class="bg-indigo-600 hover:bg-slate-900 text-white px-10 py-5 rounded-[1.5rem] text-[10px] font-black uppercase tracking-[0.2em] shadow-xl shadow-indigo-900/20 transition-all active:scale-95 flex items-center gap-3">
                        Démarrer le Sprint
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
