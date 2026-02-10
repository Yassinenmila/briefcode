@extends('layouts.admin')

@section('admincontent')
<main class="flex-1 min-h-screen bg-slate-50 p-8 lg:p-12">

    {{-- BIENVENUE & DATE --}}
    <header class="max-w-7xl mx-auto mb-12 flex flex-col md:flex-row justify-between items-start md:items-end gap-6">
        <div>
            <div class="flex items-center gap-3 mb-2">
                <span class="w-12 h-1.5 bg-blue-600 rounded-full"></span>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] italic">Espace Instructeur</p>
            </div>
            <h1 class="text-5xl font-black text-slate-900 uppercase tracking-tighter italic leading-none">
                Hello, <span class="text-blue-600">Coach {{ Auth::user()->prenom }}</span>
            </h1>
        </div>
        <div class="bg-white px-6 py-4 rounded-3xl shadow-sm border border-slate-200 flex items-center gap-4">
            <div class="text-right">
                <p class="text-[10px] font-black text-slate-400 uppercase italic">Aujourd'hui</p>
                <p class="text-sm font-black text-slate-900 uppercase italic">{{ now()->format('d M Y') }}</p>
            </div>
            <div class="h-10 w-10 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
        </div>
    </header>

    <div class="max-w-7xl mx-auto space-y-12">

        {{-- STATS RAPIDES --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
                $stats = [
                    ['label' => 'Classes Actives', 'value' => '03', 'color' => 'blue', 'icon' => 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10'],
                    ['label' => 'Total Apprenants', 'value' => '78', 'color' => 'emerald', 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197'],
                    ['label' => 'Sprints Terminés', 'value' => '12', 'color' => 'amber', 'icon' => 'M13 10V3L4 14h7v7l9-11h-7z'],
                    ['label' => 'Taux de Réussite', 'value' => '92%', 'color' => 'indigo', 'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z']
                ];
            @endphp

            @foreach($stats as $stat)
            <div class="bg-white p-8 rounded-[2.5rem] border border-slate-200 shadow-sm group hover:border-{{ $stat['color'] }}-500 transition-all">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-{{ $stat['color'] }}-50 text-{{ $stat['color'] }}-600 rounded-2xl group-hover:bg-{{ $stat['color'] }}-600 group-hover:text-white transition-all">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $stat['icon'] }}"/></svg>
                    </div>
                </div>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest italic">{{ $stat['label'] }}</p>
                <p class="text-4xl font-black text-slate-900 tracking-tighter italic">{{ $stat['value'] }}</p>
            </div>
            @endforeach
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

            {{-- COLONNE GAUCHE : CLASSES & PROGRES --}}
            <div class="lg:col-span-2 space-y-12">

                {{-- SECTION CLASSES --}}
                <section class="space-y-6">
                    <div class="flex justify-between items-center px-2">
                        <h2 class="text-sm font-black uppercase tracking-widest text-slate-900 italic">Mes Classes en cours</h2>
                        <a href="#" class="text-[10px] font-black text-blue-600 uppercase border-b-2 border-blue-600 pb-1">Voir tout</a>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Simu Loop --}}
                        @foreach(['Alpha-2026', 'Gamma-Dev'] as $className)
                        <div class="bg-white rounded-[2.5rem] p-8 border border-slate-200 shadow-sm relative overflow-hidden group">
                            <div class="relative z-10">
                                <span class="text-[9px] font-black px-3 py-1 bg-slate-100 text-slate-500 rounded-lg uppercase tracking-widest">Promotion 2026</span>
                                <h3 class="text-2xl font-black text-slate-900 uppercase italic mt-4 mb-1 group-hover:text-blue-600 transition-colors">{{ $className }}</h3>
                                <p class="text-xs text-slate-400 font-medium mb-6 italic">24 Apprenants • Fullstack JS</p>

                                <div class="space-y-2">
                                    <div class="flex justify-between text-[10px] font-black uppercase italic">
                                        <span class="text-slate-400">Progression Sprint 04</span>
                                        <span class="text-blue-600">65%</span>
                                    </div>
                                    <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                                        <div class="bg-blue-600 h-full w-[65%] rounded-full shadow-[0_0_10px_rgba(37,99,235,0.3)]"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute -right-4 -bottom-4 opacity-[0.03] group-hover:opacity-[0.08] transition-opacity">
                                <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L1 21h22L12 2z"/></svg>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </section>

                {{-- DERNIERS SPRINTS --}}
                <section class="space-y-6">
                    <h2 class="text-sm font-black uppercase tracking-widest text-slate-900 italic ml-2">Sprints & Itérations</h2>
                    <div class="bg-white rounded-[2.5rem] border border-slate-200 overflow-hidden shadow-sm">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-50/50">
                                    <th class="px-8 py-5 text-[9px] font-black text-slate-400 uppercase tracking-widest italic">Sprint</th>
                                    <th class="px-8 py-5 text-[9px] font-black text-slate-400 uppercase tracking-widest italic">Classe</th>
                                    <th class="px-8 py-5 text-[9px] font-black text-slate-400 uppercase tracking-widest italic">État</th>
                                    <th class="px-8 py-5 text-[9px] font-black text-slate-400 uppercase tracking-widest italic text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50">
                                @foreach([['name' => 'Auth System', 'class' => 'Alpha', 'status' => 'En cours'], ['name' => 'API Design', 'class' => 'Gamma', 'status' => 'Review']] as $sprint)
                                <tr class="hover:bg-slate-50/80 transition-colors">
                                    <td class="px-8 py-5 font-black text-slate-900 uppercase italic text-sm">{{ $sprint['name'] }}</td>
                                    <td class="px-8 py-5 text-xs font-bold text-slate-500 italic">{{ $sprint['class'] }}</td>
                                    <td class="px-8 py-5">
                                        <span class="px-3 py-1 rounded-lg bg-blue-50 text-blue-600 text-[9px] font-black uppercase italic">{{ $sprint['status'] }}</span>
                                    </td>
                                    <td class="px-8 py-5 text-right">
                                        <button class="p-2 text-slate-300 hover:text-blue-600 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>

            {{-- COLONNE DROITE : ACTIVITÉS & TOP SKILLS --}}
            <div class="space-y-12">

                {{-- TOP COMPÉTENCES --}}
                <div class="bg-slate-900 rounded-[2.5rem] p-10 text-white shadow-2xl relative overflow-hidden">
                    <h3 class="text-[10px] font-black uppercase tracking-[0.2em] text-blue-400 mb-8 italic">Focus Compétences</h3>
                    <div class="space-y-6">
                        @foreach(['Laravel' => 85, 'Vue.js' => 70, 'Tailwind' => 95] as $skill => $level)
                        <div class="space-y-2">
                            <div class="flex justify-between text-[10px] font-black uppercase italic tracking-widest">
                                <span>{{ $skill }}</span>
                                <span class="text-blue-400">{{ $level }}%</span>
                            </div>
                            <div class="w-full bg-white/10 h-1.5 rounded-full">
                                <div class="bg-blue-500 h-full rounded-full shadow-[0_0_10px_rgba(59,130,246,0.5)]" style="width: {{ $level }}%"></div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <svg class="absolute -right-10 -bottom-10 w-48 h-48 text-white/5" fill="currentColor" viewBox="0 0 24 24"><path d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>

                {{-- NOTIFICATIONS / ALERTES --}}
                <div class="bg-white rounded-[2.5rem] p-10 border border-slate-200 shadow-sm">
                    <h3 class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-8 italic">Flux d'activité</h3>
                    <div class="space-y-8">
                        @foreach([1,2,3] as $notif)
                        <div class="flex gap-4 relative">
                            @if(!$loop->last) <div class="absolute left-4 top-10 w-px h-10 bg-slate-100"></div> @endif
                            <div class="h-8 w-8 rounded-xl bg-slate-50 flex items-center justify-center text-blue-600 shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <div>
                                <p class="text-[11px] font-black text-slate-900 uppercase tracking-tighter italic">Nouveau rendu : Sprint 04</p>
                                <p class="text-[9px] font-bold text-slate-400 uppercase mt-1">Il y a 12 min • Par Marc Keryo</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
@endsection
