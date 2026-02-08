@extends('layouts.admin')

@section('admincontent')

<main class="flex-1 min-h-screen bg-slate-50 overflow-y-auto">

    {{-- TOP BAR --}}
    <nav class="bg-white border-b border-slate-200 px-8 py-4 flex items-center justify-between sticky top-0 z-30">
        <a href="{{ route('sprints.index') }}" class="flex items-center gap-2 text-slate-400 hover:text-indigo-600 transition-colors group">
            <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"/>
            </svg>
            <span class="text-[10px] font-black uppercase tracking-widest italic">Retour</span>
        </a>

        <a href="{{ route('sprints.edit', $sprint->id) }}"
           class="px-5 py-2 text-[10px] font-black uppercase tracking-widest text-slate-400 hover:text-slate-900 italic">
           Modifier
        </a>
    </nav>

    <div class="p-8 lg:p-12 max-w-7xl mx-auto space-y-8">

        {{-- SPRINT HEADER --}}
        <div class="bg-white rounded-[2.5rem] p-10 border border-slate-200 shadow-sm grid lg:grid-cols-2 gap-10 items-center">

            <div class="space-y-5">
                <span class="px-4 py-1.5 bg-indigo-600 text-white text-[10px] font-black uppercase tracking-[0.2em] rounded-full shadow">
                    Sprint
                </span>

                <h1 class="text-5xl font-black text-slate-900 uppercase tracking-tighter italic leading-none">
                    {{ $sprint->title }}
                </h1>

                <p class="text-slate-500 text-base font-medium leading-relaxed italic">
                    {{ $sprint->description }}
                </p>
            </div>

            <div class="bg-slate-900 rounded-[2rem] p-8 text-white shadow-xl">
                <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-3">Période</p>
                <div class="flex justify-between text-sm font-bold">
                    <span>{{ $sprint->start_date }}</span>
                    <span>{{ $sprint->end_date }}</span>
                </div>
            </div>

        </div>

        <div class="grid lg:grid-cols-3 gap-8">

            {{-- OBJECTIFS --}}
            <div class="lg:col-span-2 bg-white rounded-[2.5rem] border border-slate-200 shadow-sm p-10">
                <h3 class="text-xs font-black uppercase tracking-[0.2em] text-slate-900 mb-8 flex items-center gap-3">
                    <span class="w-1.5 h-5 bg-indigo-600 rounded-full"></span>
                    Compétences ciblées
                </h3>

                <div class="grid md:grid-cols-2 gap-5">
                    @foreach($Competences as $competence)
                    <div class="p-5 bg-slate-50 rounded-xl text-sm font-bold text-slate-800">
                        {{ $competence->code }}
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
