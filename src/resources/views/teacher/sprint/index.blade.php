@extends('layouts.teacher')

@section('teachercontent')
<main class="flex-1 min-h-screen bg-slate-50 p-8 lg:p-12">

    {{-- HEADER & FILTRES --}}
    <header class="max-w-7xl mx-auto mb-12">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-8">
            <div class="space-y-2">
                <div class="flex items-center gap-3">
                    <span class="w-12 h-1.5 bg-blue-600 rounded-full"></span>
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] italic">Roadmap Pédagogique</p>
                </div>
                <h1 class="text-5xl font-black text-slate-900 uppercase tracking-tighter italic leading-none">
                    Gestion des <span class="text-blue-600">Sprints</span>
                </h1>
            </div>

            {{-- FORMULAIRE DE FILTRE --}}
            <form action="{{ route('teacher.sprints.index') }}" method="GET" class="flex flex-wrap items-center gap-4 bg-white p-3 rounded-[2rem] border border-slate-200 shadow-xl shadow-slate-200/50">
                <div class="flex items-center gap-3 px-4">
                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <div class="flex flex-col">
                        <span class="text-[8px] font-black text-slate-400 uppercase italic">Date de début</span>
                        <input type="date" name="start_date" value="{{ request('start_date') }}"
                            class="text-[10px] font-black uppercase border-none focus:ring-0 p-0 bg-transparent text-slate-900">
                    </div>
                </div>

                <div class="h-10 w-px bg-slate-100 hidden md:block"></div>

                <button type="submit" class="bg-slate-900 hover:bg-blue-600 text-white px-8 py-3 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all italic flex items-center gap-2">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    Filtrer l'affichage
                </button>
            </form>
        </div>
    </header>

    {{-- LISTE DES SPRINTS --}}
    <div class="max-w-7xl mx-auto space-y-8">
        @forelse($sprints as $sprint)
            <div class="group relative bg-white rounded-[3rem] border border-slate-200 p-10 shadow-sm hover:shadow-2xl hover:border-blue-500/20 transition-all duration-500 overflow-hidden flex flex-col lg:flex-row gap-10">

                {{-- CHIFFRE DE FOND DÉCORATIF --}}
                <div class="absolute -top-6 -right-6 select-none pointer-events-none">
                    <span class="text-[12rem] font-black italic text-slate-50 group-hover:text-blue-50 transition-colors leading-none">
                        {{ $loop->iteration < 10 ? '0'.$loop->iteration : $loop->iteration }}
                    </span>
                </div>

                {{-- COLONNE 1 : INFOS PRINCIPALES --}}
                <div class="relative z-10 flex-1 space-y-6">
                    <div class="flex items-center gap-4">
                        @php
                            $statusColors = [
                                'terminé' => 'bg-emerald-500',
                                'en cours' => 'bg-blue-600',
                                'à venir' => 'bg-slate-300'
                            ];
                            $status = strtolower($sprint->status ?? 'en cours');
                        @endphp
                        <span class="flex items-center gap-2 px-4 py-1.5 {{ $statusColors[$status] ?? 'bg-blue-600' }} text-white text-[9px] font-black uppercase tracking-widest rounded-full italic shadow-lg">
                            <span class="w-1.5 h-1.5 bg-white rounded-full {{ $status == 'en cours' ? 'animate-pulse' : '' }}"></span>
                            Sprint {{ $status }}
                        </span>
                        <span class="text-[10px] font-bold text-slate-400 uppercase italic tracking-tighter">
                            {{ \Carbon\Carbon::parse($sprint->start_date)->translatedFormat('d M') }} — {{ \Carbon\Carbon::parse($sprint->end_date)->translatedFormat('d M Y') }}
                        </span>
                    </div>

                    <div class="space-y-2">
                        <h3 class="text-4xl font-black text-slate-900 uppercase tracking-tighter italic leading-none group-hover:text-blue-600 transition-colors">
                            {{ $sprint->name }}
                        </h3>
                        <p class="text-sm text-slate-500 font-medium italic leading-relaxed max-w-xl">
                            {{ $sprint->description ?? 'Pas de description fournie pour ce sprint pédagogique.' }}
                        </p>
                    </div>
                </div>

                {{-- COLONNE 2 : COMPÉTENCES --}}
                <div class="relative z-10 lg:w-1/4">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-6 italic">Compétences ciblées</p>
                    <div class="flex flex-wrap gap-3">
                        @foreach($sprint->competences as $skill)
                            <div class="flex items-center gap-2 px-4 py-2 bg-slate-50 border border-slate-100 rounded-2xl group-hover:bg-blue-50 group-hover:border-blue-100 transition-colors">
                                <div class="w-1.5 h-1.5 rounded-full bg-blue-500"></div>
                                <span class="text-[10px] font-black text-slate-600 group-hover:text-blue-700 uppercase italic">{{ $skill->code }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- COLONNE 3 : PROGRESSION & ACTIONS --}}
                <div class="relative z-10 lg:w-1/6 flex flex-col justify-between items-end border-t lg:border-t-0 lg:border-l border-slate-100 pt-8 lg:pt-0 lg:pl-10">
                    <div class="text-right">
                        <p class="text-[10px] font-black text-slate-300 uppercase italic mb-1">Taux de succès</p>
                        <div class="flex items-baseline justify-end gap-1">
                            <span class="text-4xl font-black text-slate-900 italic">85</span>
                            <span class="text-lg font-black text-blue-600 italic">%</span>
                        </div>
                    </div>

                    <div class="flex gap-3">
                        <a href="{{ route('teacher.sprints.edit', $sprint->id) }}" class="p-4 bg-slate-50 text-slate-400 rounded-2xl hover:bg-slate-900 hover:text-white transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        </a>
                        <a href="{{ route('teacher.sprints.show', $sprint->id) }}" class="p-4 bg-blue-600 text-white rounded-2xl hover:bg-slate-900 transition-all shadow-xl shadow-blue-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                        </a>
                    </div>
                </div>

            </div>
        @empty
            <div class="bg-white rounded-[4rem] border-2 border-dashed border-slate-200 p-32 text-center shadow-inner">
                <div class="w-24 h-24 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-8">
                    <svg class="w-12 h-12 text-slate-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="text-2xl font-black text-slate-900 uppercase italic">Aucun Sprint Programmé</h3>
                <p class="text-slate-400 font-medium italic mt-2">Essayez d'ajuster vos filtres de recherche ou créez un nouveau sprint.</p>
                <a href="{{ route('teacher.sprints.create') }}" class="inline-block mt-10 px-10 py-4 bg-slate-900 text-white text-[10px] font-black uppercase tracking-widest rounded-2xl hover:bg-blue-600 transition-all italic">
                    Ajouter un Sprint
                </a>
            </div>
        @endforelse
    </div>
</main>

<style>
    /* Style pour personnaliser le calendrier input date */
    input[type="date"]::-webkit-calendar-picker-indicator {
        opacity: 0;
        position: absolute;
        width: 100%;
        left: 0;
        cursor: pointer;
    }
</style>
@endsection
