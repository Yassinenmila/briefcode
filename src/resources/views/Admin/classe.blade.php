@extends('layouts.admin')

@section('admincontent')

<main class="flex-1 min-h-screen bg-slate-50 overflow-y-auto">
    <header class="h-20 bg-white border-b border-slate-200 px-8 flex items-center justify-between sticky top-0 z-20">
        <div>
            <h1 class="text-2xl font-black text-slate-900 uppercase tracking-tighter">
                Classes <span class="text-blue-600 italic">BriefCode</span>
            </h1>
        </div>
        <button class="bg-slate-900 hover:bg-blue-600 text-white px-5 py-2.5 rounded-xl text-xs font-black uppercase tracking-widest transition-all shadow-lg active:scale-95">
            Nouvelle Classe +
        </button>
    </header>

    <div class="p-8">
        <div class="flex gap-4 mb-8 overflow-x-auto pb-2">
            <button class="px-6 py-2 bg-white border border-slate-200 rounded-full text-xs font-black uppercase tracking-tighter text-blue-600 shadow-sm">Toutes</button>
            <button class="px-6 py-2 bg-white border border-slate-200 rounded-full text-xs font-black uppercase tracking-tighter text-slate-400 hover:border-blue-600 hover:text-blue-600 transition-all shadow-sm">Année 1</button>
            <button class="px-6 py-2 bg-white border border-slate-200 rounded-full text-xs font-black uppercase tracking-tighter text-slate-400 hover:border-blue-600 hover:text-blue-600 transition-all shadow-sm">Année 2</button>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            {{-- Exemple de Carte Classe --}}
           @foreach($classes as $classe)
            <a href="{{ route('classes.show', $classe->id) }}">
                <div class="group bg-white rounded-3xl border border-slate-200 p-6 hover:shadow-xl hover:border-blue-500/30 transition-all cursor-pointer relative overflow-hidden">
                    <div class="absolute -right-4 -top-4 bg-blue-50 h-24 w-24 rounded-full group-hover:scale-150 transition-transform duration-500 opacity-50"></div>
                    <div class="relative z-10">
                        <div class="flex justify-between items-start mb-4">
                            <div class="bg-slate-100 p-3 rounded-2xl group-hover:bg-blue-600 group-hover:text-white transition-colors">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <span class="text-[10px] font-black uppercase tracking-widest text-blue-600 bg-blue-50 px-2 py-1 rounded-md">Promotion 2024</span>
                        </div>
                        <h3 class="text-xl font-black text-slate-900 uppercase tracking-tighter mb-1">{{ $classe->name }}</h3>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-6 italic">Formateur : </p>
                        <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                            <div class="flex -space-x-2">
                                <img class="w-7 h-7 rounded-full border-2 border-white object-cover" src="https://i.pravatar.cc/150?u=1">
                                <img class="w-7 h-7 rounded-full border-2 border-white object-cover" src="https://i.pravatar.cc/150?u=2">
                                <img class="w-7 h-7 rounded-full border-2 border-white object-cover" src="https://i.pravatar.cc/150?u=3">
                                <div class="w-7 h-7 rounded-full border-2 border-white bg-slate-100 flex items-center justify-center text-[10px] font-bold text-slate-500">+12</div>
                            </div>
                            <div class="text-right">
                                <p class="text-[10px] font-black text-slate-400 uppercase leading-none">Étudiants</p>
                                <p class="text-sm font-black text-slate-900 uppercase tracking-tighter">45/ 25</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</main>

@endsection
