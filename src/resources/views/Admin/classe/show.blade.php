@extends('layouts.admin')

@section('admincontent')

<main class="flex-1 flex flex-col bg-slate-50 min-h-screen">
    {{-- HEADER --}}
    <header class="bg-white border-b border-slate-200 px-8 lg:px-12 py-10 sticky top-0 z-30 shadow-sm shadow-slate-100/50">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-start md:items-center gap-8">
            <div class="space-y-2">
                <div class="flex items-center gap-3">
                    <span class="px-3 py-1 bg-blue-600 text-white text-[10px] font-black uppercase tracking-[0.2em] rounded-lg shadow-lg shadow-blue-900/20">
                        PROMOTION {{ $classe->promotion }}
                    </span>
                    <span class="h-1.5 w-1.5 rounded-full bg-slate-300"></span>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest italic">Visualisation Classe</p>
                </div>
                <h1 class="text-5xl font-black text-slate-900 uppercase tracking-tighter italic leading-none">
                    {{ $classe->name }} <span class="text-blue-600">#{{ $classe->id }}</span>
                </h1>
                <p class="text-slate-500 text-sm max-w-2xl font-medium leading-relaxed italic">
                    {{ $classe->description }}
                </p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('classes.edit', $classe->id) }}" class="bg-slate-900 text-white px-8 py-4 rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-blue-600 transition-all shadow-xl active:scale-95">
                    Paramètres Avancés
                </a>
            </div>
        </div>
    </header>

    {{-- CONTENT --}}
    <div class="max-w-7xl mx-auto p-8 lg:p-12 w-full">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

            {{-- LEFT SIDE --}}
            <div class="lg:col-span-2 space-y-12">

                {{-- SECTION FORMATEURS --}}
                <div class="space-y-6">
                    <h2 class="text-sm font-black uppercase tracking-[0.15em] text-slate-900 flex items-center gap-3 ml-2">
                        <span class="w-1.5 h-6 bg-blue-600 rounded-full"></span>
                        Équipe Pédagogique
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($classe->teachers as $teacher)
                            @if($loop->first)
                                {{-- FORMATEUR PRINCIPAL (LEAD) --}}
                                <div class="md:col-span-2 bg-slate-900 rounded-[2.5rem] p-8 flex items-center justify-between border border-slate-800 shadow-2xl relative overflow-hidden group">
                                    <div class="flex items-center gap-6 relative z-10">
                                        <div class="relative">
                                            <img src="https://ui-avatars.com/api/?name={{ $teacher->prenom }}+{{ $teacher->nom }}&background=2563eb&color=fff"
                                                 class="h-20 w-20 rounded-[1.5rem] border-2 border-slate-700 object-cover shadow-2xl">
                                            <div class="absolute -top-3 -right-3 bg-blue-600 text-white text-[9px] font-black px-3 py-1 rounded-full uppercase tracking-widest shadow-lg border-2 border-slate-900">
                                                Lead
                                            </div>
                                        </div>
                                        <div>
                                            <p class="text-[10px] font-black text-blue-400 uppercase tracking-widest italic mb-1">Formateur Référent</p>
                                            <h3 class="text-2xl font-black text-white uppercase tracking-tighter italic">
                                                {{ $teacher->prenom }} {{ $teacher->nom }}
                                            </h3>
                                            <p class="text-xs font-medium text-slate-400 lowercase italic">{{ $teacher->email }}</p>
                                        </div>
                                    </div>
                                    <div class="hidden sm:block opacity-10 group-hover:opacity-30 transition-opacity">
                                        <svg class="w-20 h-20 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L1 21h22L12 2zm0 3.45l8.15 14.1H3.85L12 5.45z"/></svg>
                                    </div>
                                </div>
                            @else
                                {{-- FORMATEURS BACKUP --}}
                                <div class="bg-white rounded-[2rem] p-6 border border-slate-200 flex items-center gap-5 shadow-sm hover:border-blue-200 transition-all group">
                                    <img src="https://ui-avatars.com/api/?name={{ $teacher->prenom }}+{{ $teacher->nom }}&background=f1f5f9&color=64748b"
                                         class="h-14 w-14 rounded-2xl border border-slate-100 object-cover">
                                    <div>
                                        <div class="flex items-center gap-2">
                                            <h4 class="text-base font-black text-slate-900 uppercase tracking-tighter italic">
                                                {{ $teacher->prenom }} {{ $teacher->nom }}
                                            </h4>
                                            <span class="text-[8px] font-black text-slate-400 uppercase border border-slate-100 px-2 py-0.5 rounded-full italic">Backup</span>
                                        </div>
                                        <p class="text-[10px] font-bold text-slate-400 lowercase">{{ $teacher->email }}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                {{-- STUDENTS LIST --}}
                <div class="bg-white rounded-[3rem] border border-slate-200 shadow-sm overflow-hidden">
                    <div class="px-10 py-8 border-b border-slate-100 flex justify-between items-center bg-slate-50/30">
                        <h2 class="text-sm font-black uppercase tracking-[0.15em] text-slate-900 flex items-center gap-3">
                            <span class="w-1.5 h-6 bg-blue-600 rounded-full"></span>
                            Membres inscrits
                        </h2>
                        <span class="px-4 py-1.5 bg-white border border-slate-200 rounded-full text-[10px] font-black text-slate-400 uppercase tracking-widest italic">
                            {{ $classe->students->count() }} / 30 Apprenants
                        </span>
                    </div>

                    <div class="divide-y divide-slate-50">
                        @foreach($classe->students as $student)
                        <div class="px-10 py-6 flex items-center justify-between hover:bg-slate-50/80 transition-all group">
                            <div class="flex items-center gap-5">
                                <img src="https://i.pravatar.cc/150?u={{ $student->id }}"
                                     class="h-14 w-14 rounded-2xl object-cover border-2 border-white shadow-md">
                                <div>
                                    <p class="text-base font-black text-slate-900 uppercase tracking-tighter italic group-hover:text-blue-600 transition-colors">
                                        {{ $student->name }}
                                    </p>
                                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-tight italic">
                                        {{ $student->email }}
                                    </p>
                                </div>
                            </div>
                            <form action="{{ route('class.removeStudent', [$classe->id, $student->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="p-4 bg-slate-50 text-slate-300 rounded-2xl hover:text-red-500 hover:bg-red-50 transition-all shadow-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"/></svg>
                                </button>
                            </form>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- RIGHT SIDE (STATS) --}}
            <div class="space-y-8">
                @php
                    $max_places = 30;
                    $count = $classe->students->count();
                    $rate = ($count / $max_places) * 100;
                @endphp

                <div class="bg-white rounded-[2.5rem] border border-slate-200 p-10 shadow-sm sticky top-40">
                    <h3 class="text-[10px] font-black uppercase tracking-[0.2em] text-blue-600 mb-8 italic">Classe Analytics</h3>

                    <div class="space-y-8">
                        <div>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-3 italic">Taux d'occupation</p>
                            <div class="flex items-end justify-between mb-3">
                                <p class="text-5xl font-black text-slate-900 tracking-tighter italic leading-none">
                                    {{ round($rate) }}<span class="text-slate-300 text-2xl">%</span>
                                </p>
                                <p class="text-[10px] font-black text-slate-400 uppercase italic">{{ $count }} / {{ $max_places }}</p>
                            </div>
                            <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                                <div class="bg-blue-600 h-full rounded-full transition-all duration-1000 shadow-[0_0_12px_rgba(37,99,235,0.4)]"
                                     style="width: {{ $rate }}%"></div>
                            </div>
                        </div>

                        <div class="pt-8 border-t border-slate-50">
                            <div class="flex justify-between items-center p-4 bg-slate-50 rounded-2xl border border-slate-100">
                                <span class="text-[10px] font-black text-slate-400 uppercase italic">Status</span>
                                <span class="flex items-center gap-2">
                                    <span class="h-2 w-2 rounded-full bg-green-500 animate-pulse"></span>
                                    <span class="text-[10px] font-black text-slate-900 uppercase italic">Active</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
