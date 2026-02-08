@extends('layouts.admin')

@section('admincontent')
    <div class="max-w-4xl mx-auto py-8 px-4">

        <div class="bg-white rounded-[2rem] p-8 md:p-12 shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-slate-100 mb-8 relative overflow-hidden">
            <div class="relative z-10">
                <div class="flex items-center gap-3 mb-6">
                    <span class="bg-emerald-600 text-white text-[10px] font-black px-4 py-1.5 rounded-full uppercase tracking-widest">
                        Référentiel
                    </span>
                    <span class="h-1.5 w-1.5 rounded-full bg-slate-200"></span>
                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest italic text-sm">Skills Library</span>
                </div>
                <h1 class="text-4xl md:text-5xl font-black text-slate-900 uppercase tracking-tighter italic mb-4">
                    Nouvelle <span class="text-emerald-500">Compétence</span>
                </h1>
                <p class="text-slate-500 font-medium max-w-md italic leading-relaxed">Enregistrez une nouvelle expertise technique ou méthodologique dans la base de données.</p>
            </div>
            <div class="absolute right-0 top-0 h-full w-1/3 bg-gradient-to-br from-emerald-400 to-teal-600 opacity-10 rounded-l-[5rem]"></div>
        </div>

        <form class="space-y-8" method="POST" action="{{ route('competences.store') }}">
            @csrf
            <div class="bg-white rounded-[2rem] p-8 md:p-12 shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-slate-100">

                <div class="flex items-center gap-4 mb-10 pb-4 border-b border-slate-50">
                    <span class="w-1.5 h-6 bg-emerald-500 rounded-full"></span>
                    <h2 class="text-sm font-black uppercase tracking-widest text-slate-900">Identification Technique</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    {{-- CODE --}}
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1 italic">Code Unique</label>
                        <input name="code" type="text" placeholder="ex: LAR-01"
                            class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-slate-900 placeholder:text-slate-300 focus:ring-2 focus:ring-emerald-500 outline-none transition-all font-black uppercase italic shadow-inner">
                        <p class="text-[9px] text-slate-400 font-bold uppercase tracking-tighter mt-1 italic">Utilisé pour l'indexation technique</p>
                    </div>

                    {{-- TYPE --}}
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1 italic">Type de compétence</label>
                        <select name="type" class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-slate-900 focus:ring-2 focus:ring-emerald-500 outline-none transition-all font-bold appearance-none shadow-inner italic">
                            <option value="IMITER">IMITER</option>
                            <option value="SADAPTER">SADAPTER</option>
                            <option value="TRANSPOSER">TRANSPOSER</option>
                        </select>
                    </div>

                    {{-- DESCRIPTION --}}
                    <div class="space-y-2 md:col-span-2">
                        <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1 italic">Description détaillée</label>
                        <textarea name="description" rows="5" placeholder="Quels sont les critères de validation de cette compétence ?"
                            class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-slate-900 placeholder:text-slate-300 focus:ring-2 focus:ring-emerald-500 outline-none transition-all font-medium shadow-inner"></textarea>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-6 mt-16 pt-8 border-t border-slate-50">
                    <a href="{{ route('competences.index') }}" class="text-[10px] font-black uppercase tracking-widest text-slate-400 hover:text-slate-900 transition-all">
                        Annuler
                    </a>

                    <button type="submit" class="bg-slate-900 hover:bg-emerald-600 text-white px-10 py-5 rounded-[1.5rem] text-[10px] font-black uppercase tracking-[0.2em] shadow-xl shadow-slate-200 transition-all active:scale-95 flex items-center gap-3">
                        Enregistrer la compétence
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"/>
                        </svg>
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
