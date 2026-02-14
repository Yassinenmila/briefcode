@extends('layouts.teacher')

@section('teachercontent')
<main class="flex-1 min-h-screen bg-slate-50 p-8 lg:p-12">

    {{-- HEADER DYNAMIQUE --}}
    <div class="max-w-7xl mx-auto mb-12 flex flex-col md:flex-row justify-between items-start md:items-end gap-6">
        <div>
            <div class="flex items-center gap-3 mb-2">
                <span class="bg-amber-500 text-white text-[10px] font-black px-4 py-1.5 rounded-full uppercase tracking-widest shadow-lg shadow-amber-900/20">Édition Master</span>
                <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest italic">Cohorte #{{ $classe->id }}</span>
            </div>
            <h1 class="text-5xl font-black text-slate-900 uppercase tracking-tighter italic leading-none">
                Gestion <span class="text-amber-500">Effectif</span>
            </h1>
        </div>

        <div class="flex items-center gap-4">
            <a href="{{ route('classes.index') }}" class="text-[10px] font-black uppercase text-slate-400 hover:text-slate-900 transition-all italic underline underline-offset-8 decoration-slate-200">
                Abandonner
            </a>
            <button type="submit" form="edit-class-form" class="bg-slate-900 hover:bg-amber-500 text-white px-10 py-5 rounded-2xl text-[10px] font-black uppercase tracking-[0.2em] transition-all shadow-2xl shadow-slate-900/20 active:scale-95">
                Sauvegarder les changements
            </button>
        </div>
    </div>

    <form id="edit-class-form" action="{{ route('teacher.classes.update', $classe->id) }}" method="POST" class="max-w-7xl mx-auto">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">

            {{-- COLONNE GAUCHE : PARAMÈTRES --}}
            <div class="lg:col-span-4 space-y-8">
                <div class="bg-white rounded-[2.5rem] p-8 border border-slate-200 shadow-sm relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-slate-50 rounded-full -mr-16 -mt-16 opacity-50"></div>

                    <h2 class="text-xs font-black uppercase tracking-widest text-slate-900 mb-8 flex items-center gap-3 relative z-10">
                        <span class="w-1.5 h-5 bg-amber-500 rounded-full"></span>
                        Identité Classe
                    </h2>

                    <div class="space-y-6 relative z-10">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase text-slate-400 ml-1 italic">Nom technique</label>
                            <input name="name" type="text" value="{{ old('name', $classe->name) }}"
                                class="w-full bg-slate-50 border-none rounded-xl px-4 py-4 text-sm font-black uppercase italic focus:ring-2 focus:ring-amber-500 transition-all shadow-inner outline-none">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase text-slate-400 ml-1 italic">Promotion</label>
                            <input name="promotion" type="text" value="{{ old('promotion', $classe->promotion) }}"
                                class="w-full bg-slate-50 border-none rounded-xl px-4 py-4 text-sm font-black uppercase italic focus:ring-2 focus:ring-amber-500 shadow-inner outline-none">
                        </div>
                    </div>
                </div>

                {{-- WIDGET INFO --}}
                <div class="bg-slate-900 rounded-[2.5rem] p-8 text-white shadow-2xl">
                    <div class="flex items-center gap-3 mb-4">
                        <svg class="w-5 h-5 text-amber-500" fill="currentColor" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"/></svg>
                        <p class="text-[10px] font-black uppercase tracking-widest text-amber-500 italic">Guide de gestion</p>
                    </div>
                    <p class="text-[11px] font-medium italic leading-relaxed text-slate-400">
                        Les étudiants <span class="text-white font-black">en orange</span> sont déjà membres. Les étudiants <span class="text-blue-400 font-black">en bleu</span> sont libres de toute affectation.
                    </p>
                </div>
            </div>

            {{-- COLONNE DROITE : SÉLECTEUR DYNAMIQUE --}}
            <div class="lg:col-span-8">
                <div class="bg-white rounded-[3rem] border border-slate-200 shadow-sm overflow-hidden">

                    {{-- BARRE DE FILTRE & MAGIC SELECT --}}
                    <div class="p-8 border-b border-slate-100 flex flex-col md:flex-row justify-between items-center gap-4 bg-slate-50/30">
                        <div class="flex items-center gap-4">
                            <h2 class="text-xs font-black uppercase tracking-widest text-slate-900 flex items-center gap-3">
                                <span class="w-1.5 h-6 bg-amber-500 rounded-full"></span>
                                Distribution des Apprenants
                            </h2>
                            <button type="button" onclick="randomSelect()"
                                class="group flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-slate-900 text-white rounded-xl transition-all shadow-lg shadow-blue-900/20 active:scale-95">
                                <svg class="w-3.5 h-3.5 group-hover:rotate-180 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                                <span class="text-[8px] font-black uppercase tracking-widest italic">Magic Select</span>
                            </button>
                        </div>
                        <div class="flex gap-2">
                            <div class="px-4 py-2 bg-white border border-slate-200 rounded-xl text-[9px] font-black uppercase text-slate-400 italic">
                                Total sélectionné: <span id="js-count" class="text-slate-900 transition-all duration-300 inline-block">{{ $classe->students->count() }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="p-8 max-h-[650px] overflow-y-auto space-y-10 custom-scrollbar">

                        {{-- SECTION A : MEMBRES ACTUELS --}}
                        <div class="space-y-4">
                            <div class="flex items-center gap-3 ml-2">
                                <span class="text-[10px] font-black text-amber-600 uppercase italic tracking-widest">Membres de la cohorte</span>
                                <div class="h-px flex-1 bg-amber-100"></div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @foreach($classe->students as $student)
                                <label class="relative group flex items-center p-5 bg-amber-50/20 border-2 border-amber-500 rounded-[2rem] cursor-pointer hover:shadow-lg transition-all">
                                    <input type="checkbox" name="students[]" value="{{ $student->id }}" class="hidden peer" checked>

                                    <div class="w-6 h-6 rounded-lg bg-amber-500 flex items-center justify-center shadow-lg shadow-amber-500/30">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"/></svg>
                                    </div>

                                    <div class="ml-4">
                                        <p class="text-[12px] font-black text-slate-900 uppercase tracking-tighter italic">
                                            {{ $student->prenom }} {{ $student->nom }}
                                        </p>
                                        <p class="text-[9px] font-bold text-amber-600/60 uppercase italic tracking-widest">Membre Actif</p>
                                    </div>
                                </label>
                                @endforeach
                            </div>
                        </div>

                        {{-- SECTION B : ÉTUDIANTS DISPONIBLES --}}
                        <div class="space-y-4">
                            <div class="flex items-center gap-3 ml-2">
                                <span class="text-[10px] font-black text-blue-600 uppercase italic tracking-widest">Apprenants sans classe</span>
                                <div class="h-px flex-1 bg-blue-100"></div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @forelse($available_students as $student)
                                <label class="relative group flex items-center p-5 bg-white border border-slate-100 rounded-[2rem] cursor-pointer hover:border-blue-500 hover:shadow-xl transition-all has-[:checked]:border-blue-600 has-[:checked]:bg-blue-50/50">
                                    <input type="checkbox" name="students[]" value="{{ $student->id }}" class="hidden peer">

                                    <div class="w-6 h-6 rounded-lg border-2 border-slate-200 peer-checked:bg-blue-600 peer-checked:border-blue-600 flex items-center justify-center transition-all shadow-sm">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"/></svg>
                                    </div>

                                    <div class="ml-4">
                                        <p class="text-[12px] font-black text-slate-900 uppercase tracking-tighter italic">
                                            {{ $student->prenom }} {{ $student->nom }}
                                        </p>
                                        <p class="text-[9px] font-bold text-blue-400 uppercase italic tracking-widest">Disponible</p>
                                    </div>
                                </label>
                                @empty
                                <div class="col-span-full py-12 text-center bg-slate-50 border-2 border-dashed border-slate-200 rounded-[2.5rem]">
                                    <p class="text-[10px] font-black text-slate-400 uppercase italic tracking-[0.2em]">Aucun étudiant disponible pour le moment</p>
                                </div>
                                @endforelse
                            </div>
                        </div>

                    </div>

                    {{-- BOTTOM BAR --}}
                    <div class="p-8 bg-slate-900 flex justify-between items-center">
                        <p class="text-[10px] font-black text-white uppercase italic tracking-widest">Fin de liste des effectifs</p>
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 bg-amber-500 rounded-full animate-pulse"></span>
                            <span class="text-[9px] font-black text-slate-400 uppercase italic">Base de données synchronisée</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>

<script>
    // 1. GESTION DU COMPTEUR LIVE
    const checks = document.querySelectorAll('input[type="checkbox"]');
    const display = document.getElementById('js-count');

    function updateCounter() {
        const total = document.querySelectorAll('input[type="checkbox"]:checked').length;
        display.innerText = total;

        // Animation de feedback sur le chiffre
        display.classList.add('text-amber-500', 'scale-125');
        setTimeout(() => display.classList.remove('text-amber-500', 'scale-125'), 300);
    }

    checks.forEach(c => {
        c.addEventListener('change', updateCounter);
    });

    // 2. LOGIQUE DE SÉLECTION ALÉATOIRE (MAGIC SELECT)
    function randomSelect() {
        const countToAdd = prompt("Combien d'étudiants aléatoires voulez-vous ajouter ?", "5");

        if (countToAdd === null || isNaN(countToAdd) || countToAdd <= 0) return;

        // On cible uniquement les étudiants "Disponibles" qui ne sont pas cochés
        const availableCheckboxes = Array.from(document.querySelectorAll('input[name="students[]"]:not(:checked)'));

        if (availableCheckboxes.length === 0) {
            alert("Aucun étudiant disponible à ajouter !");
            return;
        }

        // Mélange Fisher-Yates
        const shuffled = availableCheckboxes.sort(() => 0.5 - Math.random());
        const toSelect = shuffled.slice(0, Math.min(parseInt(countToAdd), availableCheckboxes.length));

        toSelect.forEach((cb, index) => {
            // Effet cascade (100ms entre chaque étudiant)
            setTimeout(() => {
                cb.checked = true;
                updateCounter();

                const card = cb.closest('label');
                card.classList.add('ring-4', 'ring-blue-500', 'scale-[1.05]', 'bg-blue-50', 'z-20');

                setTimeout(() => {
                    card.classList.remove('ring-4', 'ring-blue-500', 'scale-[1.05]');
                }, 800);
            }, index * 120);
        });
    }
</script>

<style>
    .custom-scrollbar::-webkit-scrollbar { width: 5px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 20px; }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #cbd5e1; }

    /* Animation pour le compteur */
    #js-count { transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275); }
</style>
@endsection
