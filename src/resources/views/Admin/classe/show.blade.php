@extends('layouts.admin')

@section('admincontent')

        <main class="flex-1 flex flex-col">

            <header class="bg-white border-b border-slate-200 px-8 lg:px-12 py-10 sticky top-0 z-30 shadow-sm shadow-slate-100/50">
                <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-start md:items-center gap-8">
                    <div class="space-y-2">
                        <div class="flex items-center gap-3">
                            <span class="px-3 py-1 bg-blue-600 text-white text-[10px] font-black uppercase tracking-[0.2em] rounded-lg shadow-lg shadow-blue-900/20">
                                PROMOTION 2024
                            </span>
                            <span class="h-1.5 w-1.5 rounded-full bg-slate-300"></span>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest italic">Visualisation Classe</p>
                        </div>
                        <h1 class="text-5xl font-black text-slate-900 uppercase tracking-tighter italic leading-none">
                            JEE DEVS <span class="text-blue-600">#01</span>
                        </h1>
                        <p class="text-slate-500 text-sm max-w-2xl font-medium leading-relaxed">
                            Spécialisation en architectures distribuées, Spring Boot et micro-services.
                        </p>
                    </div>

                    <div class="flex gap-3">
                        <button class="bg-white border border-slate-200 text-slate-900 px-6 py-3 rounded-2xl text-xs font-black uppercase tracking-widest hover:bg-slate-50 transition-all shadow-sm">
                            Paramètres
                        </button>
                        <button class="bg-slate-900 text-white px-6 py-3 rounded-2xl text-xs font-black uppercase tracking-widest hover:bg-blue-600 transition-all shadow-xl active:scale-95">
                            Inscrire un élève +
                        </button>
                    </div>
                </div>
            </header>

            <div class="max-w-7xl mx-auto p-8 lg:p-12 w-full">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

                    <div class="lg:col-span-2 space-y-8">

                        <div class="bg-slate-900 rounded-[2.5rem] p-8 text-white shadow-2xl shadow-slate-900/20 relative overflow-hidden">
                            <div class="absolute right-0 top-0 opacity-10 transform translate-x-10 -translate-y-10">
                                <svg class="w-64 h-64" fill="currentColor" viewBox="0 0 24 24"><path d="M12 14l9-5-9-5-9 5 9 5z"/><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>
                            </div>

                            <div class="relative z-10 flex flex-col md:flex-row items-center gap-8">
                                <div class="relative">
                                    <div class="absolute -inset-2 bg-blue-500 rounded-3xl blur opacity-30 animate-pulse"></div>
                                    <img src="https://i.pravatar.cc/150?u=instructor1" class="relative h-28 w-28 rounded-3xl object-cover border-2 border-blue-500 shadow-2xl" alt="Formateur">
                                </div>

                                <div class="text-center md:text-left space-y-2">
                                    <div class="flex items-center justify-center md:justify-start gap-3">
                                        <span class="text-[10px] font-black uppercase tracking-[0.3em] text-blue-400 italic">Lead Formateur</span>
                                        <span class="h-1 w-1 rounded-full bg-slate-500"></span>
                                        <span class="text-[10px] font-black uppercase tracking-[0.3em] text-slate-400">Expert JEE / Cloud</span>
                                    </div>
                                    <h2 class="text-3xl font-black uppercase tracking-tighter italic">Karim <span class="text-blue-500">Ibrahimi</span></h2>
                                    <p class="text-slate-400 text-sm font-medium max-w-sm leading-snug">
                                        "Focus sur les architectures micro-services et l'automatisation CI/CD cette semaine."
                                    </p>
                                </div>

                                <div class="md:ml-auto">
                                    <button class="px-6 py-3 bg-white/10 hover:bg-white/20 backdrop-blur-md border border-white/10 rounded-2xl text-[10px] font-black uppercase tracking-widest transition-all">
                                        Profil Complet
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-[2.5rem] border border-slate-200 shadow-sm overflow-hidden">
                            <div class="px-10 py-8 border-b border-slate-100 flex justify-between items-center bg-slate-50/30">
                                <h2 class="text-sm font-black uppercase tracking-[0.15em] text-slate-900 flex items-center gap-3">
                                    <span class="w-1.5 h-6 bg-blue-600 rounded-full"></span>
                                    Membres inscrits
                                </h2>
                                <span class="px-4 py-1.5 bg-white border border-slate-200 rounded-full text-[10px] font-black text-slate-400 uppercase tracking-widest">
                                    12 / 30 Places
                                </span>
                            </div>

                            <div class="divide-y divide-slate-50">

                                <div class="px-10 py-6 flex items-center justify-between hover:bg-slate-50/80 transition-all group cursor-pointer">
                                    <div class="flex items-center gap-5">
                                        <div class="relative">
                                            <div class="absolute -inset-1 bg-gradient-to-tr from-blue-600 to-indigo-600 rounded-2xl opacity-0 group-hover:opacity-20 transition-opacity"></div>
                                            <img src="https://i.pravatar.cc/150?u=a" class="relative h-14 w-14 rounded-2xl object-cover border-2 border-white shadow-sm" alt="">
                                        </div>
                                        <div>
                                            <p class="text-base font-black text-slate-900 uppercase tracking-tighter">Ahmed Bennani</p>
                                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-tight italic">a.bennani@briefcode.io</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-8">
                                        <div class="hidden md:flex flex-col items-end">
                                            <p class="text-[9px] font-black text-slate-300 uppercase tracking-[0.2em] mb-1 italic">Statut</p>
                                            <span class="text-[10px] font-black text-green-500 uppercase">Présent</span>
                                        </div>
                                        <button class="p-3 bg-slate-50 text-slate-300 rounded-xl group-hover:text-red-500 group-hover:bg-red-50 transition-all">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                        </button>
                                    </div>
                                </div>

                                <div class="px-10 py-6 flex items-center justify-between hover:bg-slate-50/80 transition-all group cursor-pointer">
                                    <div class="flex items-center gap-5">
                                        <div class="relative">
                                            <div class="absolute -inset-1 bg-gradient-to-tr from-blue-600 to-indigo-600 rounded-2xl opacity-0 group-hover:opacity-20 transition-opacity"></div>
                                            <img src="https://i.pravatar.cc/150?u=b" class="relative h-14 w-14 rounded-2xl object-cover border-2 border-white shadow-sm" alt="">
                                        </div>
                                        <div>
                                            <p class="text-base font-black text-slate-900 uppercase tracking-tighter">Sara El Alami</p>
                                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-tight italic">s.alami@briefcode.io</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-8">
                                        <div class="hidden md:flex flex-col items-end">
                                            <p class="text-[9px] font-black text-slate-300 uppercase tracking-[0.2em] mb-1 italic">Statut</p>
                                            <span class="text-[10px] font-black text-orange-500 uppercase">En Retard</span>
                                        </div>
                                        <button class="p-3 bg-slate-50 text-slate-300 rounded-xl group-hover:text-red-500 group-hover:bg-red-50 transition-all">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-8">
                        <div class="bg-white rounded-[2.5rem] border border-slate-200 p-10 shadow-sm relative overflow-hidden">
                            <h3 class="text-[10px] font-black uppercase tracking-[0.2em] text-blue-600 mb-8 italic">Data & Stats</h3>
                            <div class="space-y-8">
                                <div>
                                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 italic">Taux d'occupation</p>
                                    <p class="text-4xl font-black text-slate-900 tracking-tighter italic leading-none">
                                        40<span class="text-slate-300 text-2xl tracking-normal">%</span>
                                    </p>
                                    <div class="w-full bg-slate-100 h-1.5 rounded-full mt-5 overflow-hidden">
                                        <div class="bg-blue-600 h-full rounded-full transition-all duration-1000" style="width: 40%"></div>
                                    </div>
                                </div>

                                <div class="pt-8 border-t border-slate-100">
                                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-4 italic">Prochain Brief</p>
                                    <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
                                        <p class="text-[11px] font-black text-slate-800 uppercase leading-tight">Architecture Hexagonale</p>
                                        <p class="text-[10px] text-blue-600 font-bold mt-1">Lundi, 08:30</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-blue-600 rounded-[2.5rem] p-10 text-white shadow-xl shadow-blue-900/20">
                            <div class="bg-white/20 w-10 h-10 rounded-xl flex items-center justify-center mb-6">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </div>
                            <p class="text-xs font-black uppercase tracking-[0.2em] opacity-60 mb-2">Ressources</p>
                            <p class="text-lg font-bold leading-tight italic mb-6">
                                Guide de survie Spring Security disponible.
                            </p>
                            <button class="w-full py-3 bg-white text-blue-600 rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-blue-50 transition-all shadow-lg">
                                Télécharger
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
@endsection
