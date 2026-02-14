@extends('layouts.admin')

@section('admincontent')
<main class="flex-1 min-h-screen bg-slate-50 p-8 lg:p-12">

    <div class="max-w-7xl mx-auto mb-10">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="flex items-center gap-6">
                <a href="{{ route('teacher.sprints.index') }}" class="group h-14 w-14 bg-white rounded-2xl border border-slate-200 flex items-center justify-center text-slate-400 hover:text-blue-600 hover:border-blue-600 transition-all shadow-sm">
                    <svg class="w-6 h-6 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"/></svg>
                </a>
                <div>
                    <div class="flex items-center gap-3 mb-1">
                        <span class="px-3 py-1 bg-blue-600 text-white text-[9px] font-black uppercase tracking-widest rounded-lg">Mission Detail</span>
                    </div>
                    <h1 class="text-4xl font-black text-slate-900 uppercase tracking-tighter italic leading-none">
                        {{ $sprint->title }}
                    </h1>
                </div>
            </div>

            <div class="flex gap-3">
                <a href="{{ route('sprints.edit', $sprint->id) }}" class="px-8 py-4 bg-white border border-slate-200 rounded-2xl text-[10px] font-black uppercase tracking-widest text-slate-600 hover:bg-slate-900 hover:text-white transition-all italic shadow-sm">
                    Modifier la mission
                </a>
                <button class="px-8 py-4 bg-slate-900 text-white rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-blue-600 transition-all italic shadow-xl">
                    Exporter Rapport
                </button>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-8">

        <div class="lg:col-span-8 space-y-8">

            <div class="bg-white rounded-[3rem] p-10 border border-slate-200 shadow-sm relative overflow-hidden">
                <div class="absolute top-0 right-0 p-10 opacity-[0.03] pointer-events-none">
                    <svg class="w-64 h-64 text-slate-900" fill="currentColor" viewBox="0 0 24 24"><path d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>

                <div class="relative z-10">
                    <h3 class="text-[10px] font-black text-blue-600 uppercase tracking-[0.2em] mb-6 italic">Briefing du Projet</h3>
                    <div class="prose prose-slate max-w-none">
                        <p class="text-slate-500 font-medium italic leading-relaxed text-xl">
                            {{ $sprint->description }}
                        </p>
                    </div>

                    <div class="mt-12 space-y-4">
                        <div class="flex justify-between items-end">
                            <p class="text-[10px] font-black text-slate-400 uppercase italic">Chronologie du Sprint</p>
                            <p class="text-[10px] font-black text-blue-600 uppercase italic">65% du temps écoulé</p>
                        </div>
                        <div class="relative h-4 w-full bg-slate-100 rounded-full overflow-hidden">
                            <div class="absolute top-0 left-0 h-full bg-blue-600 rounded-full shadow-[0_0_15px_rgba(59,130,246,0.5)]" style="width: 65%"></div>
                        </div>
                        <div class="flex justify-between text-[10px] font-black text-slate-900 uppercase italic">
                            <span>Lancement : {{ \Carbon\Carbon::parse($sprint->start_date)->format('d M Y') }}</span>
                            <span class="text-slate-300">|</span>
                            <span>Deadline : {{ \Carbon\Carbon::parse($sprint->end_date)->format('d M Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-slate-900 rounded-[3rem] p-10 text-white shadow-2xl">
                <h3 class="text-sm font-black uppercase tracking-widest italic flex items-center gap-3 mb-8">
                    <span class="w-3 h-3 bg-blue-500 rounded-full animate-ping"></span>
                    Objectifs de Validation
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="p-6 bg-white/5 rounded-2xl border border-white/10 hover:bg-white/10 transition-all border-l-4 border-l-blue-500">
                        <p class="text-[10px] font-black text-blue-400 uppercase mb-2 italic">Livrable 01</p>
                        <p class="text-sm font-bold italic text-slate-100 uppercase">Architecture MVC & Base de données</p>
                    </div>
                    <div class="p-6 bg-white/5 rounded-2xl border border-white/10 hover:bg-white/10 transition-all border-l-4 border-l-slate-600">
                        <p class="text-[10px] font-black text-slate-500 uppercase mb-2 italic">Livrable 02</p>
                        <p class="text-sm font-bold italic text-slate-100 uppercase">Intégration UI/UX Alpha Dev</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:col-span-4 space-y-8">

            <div class="bg-white rounded-[2.5rem] p-8 border border-slate-200 shadow-sm">
                <h3 class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-8 italic">Compétences Cibles</h3>
                <div class="space-y-4">
                    @forelse($sprint->competences as $skill)
                    <div class="group flex items-center justify-between p-4 bg-slate-50 rounded-2xl border border-slate-100 hover:border-blue-500 hover:bg-blue-50/50 transition-all">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-white rounded-xl flex items-center justify-center text-blue-600 font-black text-xs shadow-sm border border-slate-100 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                                {{ substr($skill->name, 0, 1) }}
                            </div>
                            <span class="text-[11px] font-black text-slate-900 uppercase italic">{{ $skill->code }}</span>
                            <p class="text-[9px] text-slate-500 italic">{{ $skill->type }}</p>
                        </div>
                        <svg class="w-4 h-4 text-slate-300 group-hover:text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 12l2 2 4-4"/></svg>
                    </div>
                    @empty
                    <p class="text-[10px] font-bold text-slate-400 uppercase italic">Aucune compétence liée.</p>
                    @endforelse
                </div>
            </div>

            

        </div>
    </div>
</main>
@endsection
