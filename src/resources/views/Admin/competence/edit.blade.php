@extends('layouts.admin')

@section('admincontent')
    <div class="max-w-4xl mx-auto py-8 px-4">

        <div class="bg-white rounded-[2rem] p-8 md:p-12 shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-slate-100 mb-8 relative overflow-hidden">
            <div class="relative z-10">
                <div class="flex items-center gap-3 mb-6">
                    <span class="bg-amber-500 text-white text-[10px] font-black px-4 py-1.5 rounded-full uppercase tracking-widest">
                        Ajustement Niveau
                    </span>
                    <span class="h-1.5 w-1.5 rounded-full bg-slate-200"></span>
                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest italic text-sm underline decoration-amber-500/30">Niveau de Maîtrise</span>
                </div>
                <h1 class="text-4xl md:text-5xl font-black text-slate-900 uppercase tracking-tighter italic mb-4">
                    Éditer <span class="text-emerald-500">{{ $competence->code }}</span>
                </h1>
                <p class="text-slate-500 font-medium max-w-md italic">Modifiez le niveau d'acquisition attendu pour cette compétence technique.</p>
            </div>
            <div class="absolute right-0 top-0 h-full w-1/3 bg-gradient-to-br from-emerald-400 to-amber-500 opacity-10 rounded-l-[5rem]"></div>
        </div>

        <form class="space-y-8" method="POST" action="{{ route('competences.update', $competence->id) }}">
            @csrf
            @method('PUT')

            <div class="bg-white rounded-[2rem] p-8 md:p-12 shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-slate-100">

                <div class="flex items-center gap-4 mb-10 pb-4 border-b border-slate-50">
                    <span class="w-1.5 h-6 bg-emerald-500 rounded-full"></span>
                    <h2 class="text-sm font-black uppercase tracking-widest text-slate-900">Configuration du Référentiel</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    {{-- CODE --}}
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1 italic">Code de l'unité</label>
                        <input name="code" type="text" value="{{ old('code', $competence->code) }}"
                            class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-slate-900 focus:ring-2 focus:ring-emerald-500 outline-none transition-all font-black uppercase italic shadow-inner">
                    </div>

                    {{-- TYPE (LIMITÉ AUX 3 OPTIONS) --}}
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1 italic">Niveau d'acquisition</label>
                        <div class="relative">
                            <select name="type" class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-slate-900 focus:ring-2 focus:ring-emerald-500 outline-none transition-all font-black appearance-none shadow-inner italic uppercase tracking-tighter">
                                <option value="IMITER" {{ old('type', $competence->type) == 'IMITER' ? 'selected' : '' }}>1. Imiter</option>
                                <option value="SADAPTER" {{ old('type', $competence->type) == 'SADAPTER' ? 'selected' : '' }}>2. S'adapter</option>
                                <option value="TRANSPOSER" {{ old('type', $competence->type) == 'TRANSPOSER' ? 'selected' : '' }}>3. Transposer</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-slate-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"/></svg>
                            </div>
                        </div>
                    </div>

                    {{-- DESCRIPTION --}}
                    <div class="space-y-2 md:col-span-2">
                        <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1 italic">Objectifs Pédagogiques</label>
                        <textarea name="description" rows="5"
                            class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-slate-900 focus:ring-2 focus:ring-emerald-500 outline-none transition-all font-medium shadow-inner leading-relaxed">{{ old('description', $competence->description) }}</textarea>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-6 mt-16 pt-8 border-t border-slate-50">
                    <a href="{{ route('competences.index') }}" class="text-[10px] font-black uppercase tracking-widest text-slate-400 hover:text-slate-900 transition-all">
                        Abandonner
                    </a>

                    <button type="submit" class="bg-slate-900 hover:bg-emerald-600 text-white px-10 py-5 rounded-[1.5rem] text-[10px] font-black uppercase tracking-[0.2em] shadow-xl shadow-slate-200 transition-all active:scale-95 flex items-center gap-3">
                        Mettre à jour le référentiel
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                        </svg>
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
