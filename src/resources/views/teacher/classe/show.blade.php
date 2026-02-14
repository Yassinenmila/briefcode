@extends('layouts.teacher')

@section('teachercontent')
<main class="flex-1 min-h-screen bg-slate-50 p-8 lg:p-12">

    <div class="max-w-7xl mx-auto mb-10">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="space-y-2">
                <div class="flex items-center gap-3">
                    <a href="#" class="text-slate-400 hover:text-blue-600 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"/></svg>
                    </a>
                    <span class="px-3 py-1 bg-blue-600 text-white text-[10px] font-black uppercase tracking-widest rounded-lg">Promo {{ $classe->promotion }}</span>
                    <span class="h-1.5 w-1.5 rounded-full bg-slate-300"></span>
                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest italic">Vue Instructeur</span>
                </div>
                <h1 class="text-5xl font-black text-slate-900 uppercase tracking-tighter italic">
                    {{ $classe->name }} <span class="text-blue-600">.Classe</span>
                </h1>
            </div>

            <div class="flex items-center gap-4">
                <div class="text-right hidden sm:block">
                    <p class="text-[10px] font-black text-slate-400 uppercase italic">Statut de la cohorte</p>
                    <p class="text-sm font-black text-emerald-500 uppercase italic">Active / En cours</p>
                </div>
                <div class="h-12 w-12 bg-white rounded-2xl border border-slate-200 flex items-center justify-center text-slate-900 shadow-sm">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/></svg>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8">

        <div class="lg:col-span-2 space-y-8">
            <div class="bg-white rounded-[3rem] border border-slate-200 shadow-sm overflow-hidden">
                <div class="p-8 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                    <h2 class="text-sm font-black uppercase tracking-widest text-slate-900 flex items-center gap-3">
                        <span class="w-1.5 h-6 bg-blue-600 rounded-full"></span>
                        Effectif Apprenants
                    </h2>
                    <div class="flex gap-2">
                         <span class="text-[10px] font-black text-slate-400 uppercase bg-white px-3 py-1 rounded-full border border-slate-100 italic">
                            {{ $classe->students->count() }} Membres
                        </span>
                    </div>
                </div>

                <div class="divide-y divide-slate-50">
                    @foreach($classe->students as $student)
                    <div class="p-6 flex items-center justify-between hover:bg-slate-50/80 transition-all group">
                        <div class="flex items-center gap-5">
                            <div class="relative">
                                <img src="https://ui-avatars.com/api/?name={{ $student->nom }}&background=f1f5f9&color=64748b"
                                     class="h-14 w-14 rounded-2xl object-cover border-2 border-white shadow-md">
                                <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-emerald-500 border-2 border-white rounded-full"></div>
                            </div>
                            <div>
                                <h3 class="text-base font-black text-slate-900 uppercase tracking-tighter italic group-hover:text-blue-600 transition-colors">
                                    {{ $student->prenom }}
                                </h3>
                                <p class="text-[10px] font-bold text-slate-400 uppercase italic">{{ $student->email }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <a href="#" class="p-3 bg-white border border-slate-100 text-slate-400 rounded-xl hover:text-blue-600 hover:border-blue-600 transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="space-y-8">
            <div class="bg-slate-900 rounded-[2.5rem] p-10 text-white shadow-2xl relative overflow-hidden">
                <h3 class="text-[10px] font-black uppercase tracking-[0.2em] text-blue-400 mb-8 italic">Performance Classe</h3>
                <div class="space-y-8">
                    <div>
                        <div class="flex justify-between items-end mb-3">
                            <p class="text-xs font-bold text-slate-400 uppercase italic">Engagement</p>
                            <p class="text-3xl font-black text-white italic leading-none">88%</p>
                        </div>
                        <div class="w-full bg-white/10 h-2 rounded-full overflow-hidden">
                            <div class="bg-blue-500 h-full w-[88%] rounded-full shadow-[0_0_15px_rgba(59,130,246,0.6)]"></div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-white/5 p-4 rounded-2xl border border-white/5">
                            <p class="text-[9px] font-black text-slate-400 uppercase italic mb-1">Retards</p>
                            <p class="text-xl font-black text-amber-500 italic">02</p>
                        </div>
                        <div class="bg-white/5 p-4 rounded-2xl border border-white/5">
                            <p class="text-[9px] font-black text-slate-400 uppercase italic mb-1">Absences</p>
                            <p class="text-xl font-black text-red-500 italic">00</p>
                        </div>
                    </div>
                </div>
                <svg class="absolute -right-10 -bottom-10 w-48 h-48 text-white/5" fill="currentColor" viewBox="0 0 24 24"><path d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
            </div>
            <div class="bg-white rounded-[2.5rem] p-8 border border-slate-200 shadow-sm">
                <h3 class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-6 italic">Staff Assigné</h3>
                <div class="space-y-4">
                    @foreach($classe->teachers as $teacher)
                    <div class="flex items-center gap-4">
                        <img src="https://ui-avatars.com/api/?name={{ $teacher->prenom }}+{{ $teacher->nom }}&background=f8fafc&color=1e293b"
                             class="h-10 w-10 rounded-xl border border-slate-100">
                        <div>
                            <p class="text-xs font-black text-slate-900 uppercase italic leading-none">{{ $teacher->prenom }}</p>
                            <p class="text-[9px] font-bold text-slate-400 uppercase italic">{{ $loop->first ? 'Lead Coach' : 'Assistant' }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="grid grid-cols-1 gap-4">
                <button class="w-full py-4 bg-white border border-slate-200 rounded-2xl text-[10px] font-black uppercase tracking-widest text-slate-900 hover:bg-slate-900 hover:text-white transition-all shadow-sm italic">
                    Lancer un nouveau Sprint
                </button>
                <a href="{{ route('teacher.classes.edit', $classe->id) }}" class="w-full py-4 bg-white border border-slate-200 rounded-2xl text-[10px] font-black uppercase tracking-widest text-slate-900 hover:bg-slate-900 hover:text-white transition-all shadow-sm italic">
                    Gestion des étudiants
                </a>

            </div>
        </div>
    </div>
</main>
@endsection
