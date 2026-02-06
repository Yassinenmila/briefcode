@extends('layouts.admin')

@section('admincontent')
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-[2rem] p-8 md:p-12 shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-slate-100 mb-8 relative overflow-hidden">
            <div class="relative z-10">
                <div class="flex items-center gap-3 mb-6">
                    <span class="bg-blue-600 text-white text-[10px] font-black px-4 py-1.5 rounded-full uppercase tracking-widest">
                        Configuration
                    </span>
                    <span class="h-1.5 w-1.5 rounded-full bg-slate-200"></span>
                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest italic">New Entity</span>
                </div>
                <h1 class="text-4xl md:text-5xl font-black text-slate-900 uppercase tracking-tighter italic mb-4">
                    Créer une <span class="text-blue-600">Classe</span>
                </h1>
                <p class="text-slate-500 font-medium max-w-md">Définissez les paramètres de la promotion et assignez un formateur référent.</p>
            </div>
            <div class="absolute right-0 top-0 h-full w-1/3 bg-gradient-to-br from-blue-500 to-indigo-600 opacity-10 rounded-l-[5rem]"></div>
        </div>

        <form class="space-y-8" method="POST" action="{{ route('classes.store') }}">
            @csrf
            <div class="bg-white rounded-[2rem] p-8 md:p-12 shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-slate-100">
                <div class="flex items-center gap-4 mb-10 pb-4 border-b border-slate-50">
                    <span class="w-1.5 h-6 bg-blue-600 rounded-full"></span>
                    <h2 class="text-sm font-black uppercase tracking-widest text-slate-900">Informations Générales</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-2 md:col-span-2">
                        <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1">Nom de la classe</label>
                        <input name="name" type="text" placeholder="ex: ALPHA DEV #01" class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-slate-900 placeholder:text-slate-300 focus:ring-2 focus:ring-blue-600 outline-none transition-all font-bold uppercase italic">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1">Promotion</label>
                        <input name="promotion" type="text" placeholder="ex: 2024" class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-slate-900 placeholder:text-slate-300 focus:ring-2 focus:ring-blue-600 outline-none transition-all font-bold">
                    </div>
                    <div class="space-y-2 md:col-span-2">
                        <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1">Description / Objectifs</label>
                        <textarea name="description" rows="4" placeholder="Décrivez les technologies clés..."
                            class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-slate-900 placeholder:text-slate-300 focus:ring-2 focus:ring-blue-600 outline-none transition-all font-medium"></textarea>
                    </div>
                </div>
                <div class="flex items-center justify-end gap-6 mt-16 pt-8 border-t border-slate-50">
                    <button type="button" class="text-xs font-black uppercase tracking-widest text-slate-400 hover:text-slate-900 transition-all">
                        Annuler
                    </button>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-10 py-5 rounded-[1.5rem] text-xs font-black uppercase tracking-[0.2em] shadow-xl shadow-blue-900/20 transition-all active:scale-95">
                        Déployer la classe
                    </button>
                </div>
            </div>
        </form>

    </div>

@endsection
