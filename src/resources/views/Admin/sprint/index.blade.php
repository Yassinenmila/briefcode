@extends('layouts.admin')

@section('admincontent')
<main class="flex-1 min-h-screen bg-slate-50 overflow-y-auto p-8 lg:p-12">

    <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-12">
        <div>
            <div class="flex items-center gap-3 mb-2">
                <span class="w-8 h-1 bg-indigo-600 rounded-full"></span>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] italic">Product Backlog</p>
            </div>
            <h1 class="text-5xl font-black text-slate-900 uppercase tracking-tighter italic">
                Suivi des <span class="text-indigo-600">Sprints</span>
            </h1>
        </div>
        <a href="{{ route('sprints.create') }}" class="bg-slate-900 hover:bg-indigo-600 text-white px-8 py-4 rounded-2xl text-xs font-black uppercase tracking-widest transition-all shadow-xl active:scale-95">
            Nouveau Sprint +
        </a>
    </div>

    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">

        @foreach($sprints as $sprint)
        <div class="group bg-white rounded-[2.5rem] border border-slate-200 p-8 hover:shadow-2xl hover:border-indigo-500/20 transition-all relative overflow-hidden flex flex-col">

            <div class="flex justify-between items-start mb-8">
                <div class="bg-indigo-50 text-indigo-600 px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest">
                    Sprint #{{ $loop->iteration }}
                </div>
                <div class="flex items-center gap-2">
                    <span class="h-2 w-2 rounded-full bg-green-500 animate-pulse"></span>
                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-tighter italic">Active</span>
                </div>
            </div>

            <div class="flex-1">
                <h3 class="text-2xl font-black text-slate-900 uppercase tracking-tighter leading-tight mb-3 group-hover:text-indigo-600 transition-colors">
                    {{ $sprint->title }}
                </h3>
                <p class="text-slate-400 text-sm font-medium leading-relaxed mb-6 line-clamp-2 italic">
                    {{ $sprint->description }}
                </p>
            </div>

            {{-- <div class="flex flex-wrap gap-2 mb-8">
                @foreach($sprint->competences as $competence)
                <span class="bg-slate-100 text-slate-500 px-3 py-1 rounded-lg text-[9px] font-bold uppercase tracking-tighter">
                    {{ $competence->nom }}
                </span>
                @endforeach
            </div> --}}

            <div class="space-y-3 pt-6 border-t border-slate-50">
                <div class="flex justify-between items-end">
                    <div class="space-y-1">
                        <p class="text-[9px] font-black text-slate-300 uppercase italic">Période</p>
                        <p class="text-[11px] font-bold text-slate-700 uppercase tracking-tighter">
                            {{ $sprint->start_date }} — {{ $sprint->end_date }}
                        </p>
                    </div>
                </div>
            </div>

            <a href="{{ route('sprints.show', $sprint->id) }}" class="mt-8 flex items-center justify-center gap-2 w-full py-4 bg-slate-50 group-hover:bg-indigo-600 group-hover:text-white rounded-2xl text-[10px] font-black uppercase tracking-[0.2em] transition-all">
                Détails du Sprint
                <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M13 5l7 7m0 0l-7 7m7-7H3" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
        </div>
        @endforeach

    </div>
</main>
@endsection
