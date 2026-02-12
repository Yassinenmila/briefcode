@extends('layouts.teacher')

@section('teachercontent')
<section class="max-w-7xl mx-auto py-10">

    {{-- ENTÊTE DE SECTION --}}
    <div class="flex items-end justify-between mb-8 px-4">
        <div>
            <h2 class="text-3xl font-black text-slate-900 uppercase tracking-tighter italic">
                Répertoire <span class="text-blue-600">Pédagogique</span>
            </h2>
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mt-1">Liste des cohortes sous votre supervision</p>
        </div>
    </div>

    @if(Auth::user()->teachingClasses->count() > 0)
        {{-- AFFICHAGE LISTE SI CLASSES EXISTENT --}}
        <div class="bg-white rounded-[2.5rem] border border-slate-200 shadow-xl shadow-slate-200/50 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/80 border-b border-slate-100">
                            <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] italic">Statut</th>
                            <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] italic">Classe & Promo</th>
                            <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] italic text-center">Apprenants</th>
                            <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] italic text-right">Direction</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @foreach(Auth::user()->teachingClasses ?? [] as $classe)
                        <tr class="group hover:bg-blue-50/30 transition-all cursor-pointer" onclick="window.location='{{ route('teacher.classes.show', $classe->id) }}'">

                            {{-- STATUT RÔLE --}}
                            <td class="px-8 py-6">
                                @if($classe->teachers->first()->id == Auth::id())
                                    <span class="inline-flex items-center gap-2 px-4 py-1.5 bg-slate-900 text-white text-[9px] font-black uppercase tracking-widest rounded-full italic shadow-lg shadow-slate-900/20">
                                        <span class="w-1 h-1 bg-blue-400 rounded-full animate-ping"></span>
                                        Lead Coach
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-2 px-4 py-1.5 bg-slate-100 text-slate-400 text-[9px] font-black uppercase tracking-widest rounded-full italic">
                                        Assistant Backup
                                    </span>
                                @endif
                            </td>

                            {{-- NOM & PROMO --}}
                            <td class="px-8 py-6">
                                <div class="flex flex-col">
                                    <span class="text-xl font-black text-slate-900 uppercase tracking-tighter italic group-hover:text-blue-600 transition-colors">
                                        {{ $classe->name }}
                                    </span>
                                    <span class="text-[10px] font-bold text-slate-400 uppercase italic">
                                        Promotion {{ $classe->promotion }}
                                    </span>
                                </div>
                            </td>

                            {{-- EFFECTIF --}}
                            <td class="px-8 py-6">
                                <div class="flex flex-col items-center">
                                    <span class="text-lg font-black text-slate-900 italic leading-none">{{ $classe->students->count() }}</span>
                                    <span class="text-[9px] font-black text-slate-300 uppercase italic tracking-tighter">Inscrits / 30</span>
                                </div>
                            </td>

                            {{-- LIEN --}}
                            <td class="px-8 py-6 text-right">
                                <div class="inline-flex items-center gap-3 text-slate-300 group-hover:text-blue-600 transition-all font-black uppercase text-[10px] italic tracking-widest">
                                    Consulter
                                    <div class="h-10 w-10 rounded-2xl bg-slate-50 flex items-center justify-center group-hover:bg-blue-600 group-hover:text-white transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                        </svg>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    @else
        {{-- AFFICHAGE SI LE FORMATEUR N'A AUCUNE CLASSE --}}
        <div class="bg-white rounded-[3rem] border-2 border-dashed border-slate-200 p-20 flex flex-col items-center justify-center text-center shadow-inner bg-slate-50/20">
            <div class="relative mb-8">
                {{-- Icone Alpha Stylisée --}}
                <div class="w-24 h-24 bg-slate-100 rounded-[2rem] flex items-center justify-center text-slate-200 transform -rotate-12">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <div class="absolute -top-2 -right-2 w-8 h-8 bg-blue-600 rounded-full border-4 border-white flex items-center justify-center text-white text-xs font-black">?</div>
            </div>

            <h3 class="text-2xl font-black text-slate-900 uppercase italic tracking-tighter">En attente d'affectation</h3>
            <p class="text-slate-500 font-medium italic max-w-sm mt-4 leading-relaxed">
                Votre profil est actuellement <span class="text-blue-600 font-black italic">disponible</span>. L'administration n'a pas encore lié votre compte à une promotion.
            </p>

            <div class="mt-10 p-4 bg-blue-50 rounded-2xl border border-blue-100 flex items-center gap-4">
                <span class="w-2 h-2 bg-blue-600 rounded-full animate-pulse"></span>
                <p class="text-[10px] font-black text-blue-600 uppercase tracking-widest italic">Vérification automatique active</p>
            </div>
        </div>
    @endif

</section>
@endsection
