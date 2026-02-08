@extends('layouts.admin')

@section('admincontent')
<main class="flex-1 min-h-screen bg-[#f8fafc] p-8 lg:p-12">

    <div class="max-w-6xl mx-auto mb-12 flex justify-between items-end">
        <div>
            <div class="flex items-center gap-3 mb-2">
                <span class="bg-blue-600 text-white text-[10px] font-black px-4 py-1.5 rounded-full uppercase tracking-widest">Édition Avancée</span>
                <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest italic">Gestion des effectifs</span>
            </div>
            <h1 class="text-5xl font-black text-slate-900 uppercase tracking-tighter italic leading-none">
                Configuration <span class="text-blue-600">{{ $classe->name }}</span>
            </h1>
        </div>
        <button type="submit" form="edit-class-form" class="bg-slate-900 hover:bg-blue-600 text-white px-10 py-5 rounded-2xl text-[10px] font-black uppercase tracking-widest transition-all shadow-xl active:scale-95">
            Sauvegarder les modifications
        </button>
    </div>

    <form id="edit-class-form" action="{{ route('classes.update', $classe->id) }}" method="POST" class="max-w-6xl mx-auto space-y-8">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- Informations de la classe -->
            <div class="lg:col-span-1 space-y-8">

                <div class="bg-white rounded-[2.5rem] p-8 border border-slate-100 shadow-sm">
                    <h2 class="text-xs font-black uppercase tracking-widest text-slate-900 mb-8 flex items-center gap-3">
                        <span class="w-1.5 h-5 bg-blue-600 rounded-full"></span>
                        Identité Classe
                    </h2>
                    <div class="space-y-6">
                        <div>
                            <label class="text-[10px] font-black uppercase text-slate-400 ml-1 italic">Nom</label>
                            <input name="name" type="text" value="{{ old('name', $classe->name) }}" class="w-full bg-slate-50 border-none rounded-xl px-4 py-3 text-sm font-bold mt-1 focus:ring-2 focus:ring-blue-600 transition-all shadow-inner">
                        </div>
                        <div>
                            <label class="text-[10px] font-black uppercase text-slate-400 ml-1 italic">Promotion</label>
                            <input name="promotion" type="text" value="{{ old('promotion', $classe->promotion) }}" class="w-full bg-slate-50 border-none rounded-xl px-4 py-3 text-sm font-bold mt-1 focus:ring-2 focus:ring-blue-600 shadow-inner">
                        </div>
                    </div>
                </div>

                <!-- Formateurs -->
                <div class="bg-white rounded-[2.5rem] p-8 border border-slate-100 shadow-sm">
                    <h2 class="text-xs font-black uppercase tracking-widest text-slate-900 mb-8 flex items-center gap-3">
                        <span class="w-1.5 h-5 bg-blue-600 rounded-full"></span>
                        Assigner Formateur
                    </h2>
                    <div class="space-y-4">
                        @foreach($formateurs as $formateur)
                        <label class="relative flex items-center p-4 bg-slate-50 rounded-2xl cursor-pointer hover:bg-blue-50 transition-all border border-transparent has-[:checked]:border-blue-600 has-[:checked]:bg-blue-50 group">
                            <input type="checkbox" name="formateurs[]" value="{{ $formateur->id }}" class="hidden peer"
                                {{ $classe->teachers->contains($formateur->id) ? 'checked' : '' }}>

                            <div class="h-10 w-10 bg-slate-200 rounded-xl overflow-hidden border-2 border-white shadow-sm mr-4">
                                <img src="https://ui-avatars.com/api/?name={{ $formateur->prenom }} {{ $formateur->nom }}&background=random" alt="Avatar">
                            </div>
                            <div class="flex-1">
                                <p class="text-[11px] font-black text-slate-900 uppercase tracking-tighter">{{ $formateur->prenom }} {{ $formateur->nom }}</p>
                                <p class="text-[9px] font-bold text-slate-400 uppercase italic">Formateur Référent</p>
                            </div>
                            <div class="opacity-0 peer-checked:opacity-100 text-blue-600">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/></svg>
                            </div>
                        </label>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Liste des étudiants (affichage uniquement) -->
            <div class="lg:col-span-2 space-y-8">
                <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden flex flex-col h-full">
                    <div class="p-8 border-b border-slate-50 flex justify-between items-center bg-slate-50/50">
                        <h2 class="text-xs font-black uppercase tracking-widest text-slate-900 flex items-center gap-3">
                            <span class="w-1.5 h-5 bg-blue-600 rounded-full"></span>
                            Liste des Élèves
                        </h2>
                        <span class="text-[10px] font-black text-blue-600 bg-white px-3 py-1 rounded-full shadow-sm italic">
                            {{ count($eleves) }} Candidats disponibles
                        </span>
                    </div>

                    <div class="p-8 max-h-[600px] overflow-y-auto grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($eleves as $eleve)
                        <label class="group relative flex items-center p-4 bg-white border border-slate-100 rounded-2xl cursor-pointer hover:shadow-md transition-all">
                            <div class="w-5 h-5 rounded-md border-2 border-slate-200 flex items-center justify-center transition-all"></div>

                            <div class="ml-4 flex items-center gap-3">
                                <div class="h-8 w-8 rounded-full bg-slate-100 flex items-center justify-center text-[10px] font-black text-slate-400 group-hover:bg-blue-200 group-hover:text-blue-700 transition-colors">
                                    {{ substr($eleve->nom, 0, 2) }}
                                </div>
                                <div>
                                    <p class="text-[11px] font-black text-slate-800 uppercase tracking-tighter">{{ $eleve->prenom }} {{ $eleve->nom }}</p>
                                    <p class="text-[9px] font-bold text-slate-400 lowercase">{{ $eleve->email }}</p>
                                </div>
                            </div>
                        </label>
                        @endforeach
                    </div>

                    <div class="p-8 bg-slate-50 border-t border-slate-100 mt-auto flex justify-end gap-4">
                        <a href="{{ route('classes.index') }}" class="px-6 py-3 text-[10px] font-black uppercase text-slate-400 hover:text-slate-900 transition-all italic">Annuler</a>
                        <button type="submit" class="px-8 py-3 bg-blue-600 text-white rounded-xl text-[10px] font-black uppercase tracking-widest shadow-lg shadow-blue-900/10 active:scale-95 transition-all">
                            Mettre à jour
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>
@endsection
