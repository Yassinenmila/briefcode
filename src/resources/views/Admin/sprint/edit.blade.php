@extends('layouts.admin')

@section('admincontent')
    <div class="max-w-4xl mx-auto py-8">

        <div class="bg-white rounded-[2rem] p-8 md:p-12 shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-slate-100 mb-8 relative overflow-hidden">
            <div class="relative z-10">
                <div class="flex items-center gap-3 mb-6">
                    <span class="bg-amber-500 text-white text-[10px] font-black px-4 py-1.5 rounded-full uppercase tracking-widest">
                        Ajustement
                    </span>
                    <span class="h-1.5 w-1.5 rounded-full bg-slate-200"></span>
                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest italic text-sm underline decoration-amber-500 decoration-2">Sprint ID: #{{ $sprint->id }}</span>
                </div>
                <h1 class="text-4xl md:text-5xl font-black text-slate-900 uppercase tracking-tighter italic mb-4">
                    Modifier le <span class="text-amber-500">Sprint</span>
                </h1>
                <p class="text-slate-500 font-medium max-w-md italic">Ajustez les dates ou les objectifs pour coller à la réalité du terrain.</p>
            </div>
            <div class="absolute right-0 top-0 h-full w-1/3 bg-gradient-to-br from-amber-400 to-orange-500 opacity-10 rounded-l-[5rem]"></div>
        </div>

        <form class="space-y-8" method="POST" action="{{ route('sprints.update', $sprint->id) }}">
            @csrf
            @method('PUT')

            <div class="bg-white rounded-[2rem] p-8 md:p-12 shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-slate-100">

                <div class="flex items-center gap-4 mb-10 pb-4 border-b border-slate-50">
                    <span class="w-1.5 h-6 bg-amber-500 rounded-full"></span>
                    <h2 class="text-sm font-black uppercase tracking-widest text-slate-900">Contenu de l'itération</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    {{-- Titre --}}
                    <div class="space-y-2 md:col-span-2">
                        <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1 italic">Titre du Sprint</label>
                        <input name="title" type="text" value="{{ old('titre', $sprint->title) }}"
                            class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-slate-900 focus:ring-2 focus:ring-amber-500 outline-none transition-all font-bold uppercase italic shadow-inner">
                    </div>

                    {{-- Description --}}
                    <div class="space-y-2 md:col-span-2">
                        <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1 italic">Objectifs (Description)</label>
                        <textarea name="description" rows="3"
                            class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-slate-900 focus:ring-2 focus:ring-amber-500 outline-none transition-all font-medium shadow-inner">{{ old('description', $sprint->description) }}</textarea>
                    </div>

                    {{-- Date Début --}}
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1 italic">Lancement</label>
                        <input name="start_date" type="date" value="{{ old('start_date', $sprint->start_date) }}"
                            class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-slate-900 focus:ring-2 focus:ring-amber-500 outline-none transition-all font-bold shadow-inner">
                    </div>

                    {{-- Date Fin --}}
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1 italic">Deadline</label>
                        <input name="end_date" type="date" value="{{ old('end_date', $sprint->end_date) }}"
                            class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-slate-900 focus:ring-2 focus:ring-amber-500 outline-none transition-all font-bold shadow-inner border-l-4 border-amber-100">
                    </div>
                </div>

                <div class="flex items-center gap-4 mt-16 mb-8 pb-4 border-b border-slate-50">
                    <span class="w-1.5 h-6 bg-amber-500 rounded-full"></span>
                    <h2 class="text-sm font-black uppercase tracking-widest text-slate-900">Mise à jour des compétences</h2>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    {{-- Boucle sur toutes les compétences disponibles --}}
                    @foreach($Competences as $competence)
                    <label class="group relative flex items-center p-4 bg-slate-50 rounded-2xl cursor-pointer hover:bg-amber-50 transition-all border border-transparent hover:border-amber-200 shadow-sm">
                        {{-- Checkbox cachée --}}
                        <input type="checkbox" name="competences[]" value="{{ $competence->id }}" class="hidden peer"
                            {{ $sprint->competences->contains($competence->id) ? 'checked' : '' }}>
                        {{-- Case de validation custom --}}
                        <div class="w-5 h-5 rounded-lg border-2 border-slate-300 flex items-center justify-center peer-checked:bg-amber-500 peer-checked:border-amber-500 transition-all">
                            <svg class="w-3 h-3 text-white opacity-0 peer-checked:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        {{-- Nom de la compétence --}}
                        <span class="ml-3 text-[11px] font-black uppercase tracking-tighter text-slate-600 group-hover:text-amber-900 transition-colors italic">
                            {{ $competence->code }}
                        </span>
                    </label>
                    @endforeach
                </div>
                <div class="flex items-center justify-end gap-6 mt-16 pt-8 border-t border-slate-100">
                    <a href="{{ route('sprints.show', $sprint->id) }}" class="text-[10px] font-black uppercase tracking-widest text-slate-400 hover:text-slate-900 transition-all">
                        Annuler
                    </a>

                    <button type="submit" class="bg-slate-900 hover:bg-amber-500 text-white px-10 py-5 rounded-[1.5rem] text-[10px] font-black uppercase tracking-[0.2em] shadow-xl shadow-slate-200 transition-all active:scale-95 flex items-center gap-3">
                        Mettre à jour le Sprint
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M4 12l8-8m0 0l8 8m-8-8v18"/></svg>
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
