@extends('layouts.admin')

@section('admincontent')

<main class="flex-1 flex flex-col">
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
                <p class="text-slate-500 text-sm max-w-2xl font-medium leading-relaxed">
                    {{ $classe->description }}
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

    {{-- CONTENT --}}
    <div class="max-w-7xl mx-auto p-8 lg:p-12 w-full">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

            {{-- LEFT SIDE --}}
            <div class="lg:col-span-2 space-y-8">

                {{-- TEACHER CARD --}}
                <div class="bg-slate-900 rounded-[2.5rem] p-8 text-white shadow-2xl shadow-slate-900/20 relative overflow-hidden">
                    <div class="relative z-10 flex flex-col md:flex-row items-center gap-8">

                        <img src="https://i.pravatar.cc/150?u=teacher{{ $classe->teacher->id ?? 0 }}"
                             class="h-28 w-28 rounded-3xl object-cover border-2 border-blue-500 shadow-2xl">

                        <div class="text-center md:text-left space-y-2">
                            <span class="text-[10px] font-black uppercase tracking-[0.3em] text-blue-400 italic">Lead Formateur</span>

                            <h2 class="text-3xl font-black uppercase tracking-tighter italic">
                                {{ $classe->teacher->name ?? 'Non assigné' }}
                            </h2>

                            <p class="text-slate-400 text-sm font-medium">
                                {{ $classe->teacher->email ?? '' }}
                            </p>
                        </div>
                    </div>
                </div>

                {{-- STUDENTS LIST --}}
                <div class="bg-white rounded-[2.5rem] border border-slate-200 shadow-sm overflow-hidden">

                    <div class="px-10 py-8 border-b border-slate-100 flex justify-between items-center bg-slate-50/30">
                        <h2 class="text-sm font-black uppercase tracking-[0.15em] text-slate-900 flex items-center gap-3">
                            <span class="w-1.5 h-6 bg-blue-600 rounded-full"></span>
                            Membres inscrits
                        </h2>

                        <span class="px-4 py-1.5 bg-white border border-slate-200 rounded-full text-[10px] font-black text-slate-400 uppercase tracking-widest">
                            {{ $classe->students->count() }} / 30 Places
                        </span>
                    </div>

                    <div class="divide-y divide-slate-50">

                        @foreach($classe->students as $student)
                        <div class="px-10 py-6 flex items-center justify-between hover:bg-slate-50/80 transition-all group">

                            <div class="flex items-center gap-5">
                                <img src="https://i.pravatar.cc/150?u={{ $student->id }}"
                                     class="h-14 w-14 rounded-2xl object-cover border-2 border-white shadow-sm">

                                <div>
                                    <p class="text-base font-black text-slate-900 uppercase tracking-tighter">
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
                                <button class="p-3 bg-slate-50 text-slate-300 rounded-xl hover:text-red-500 hover:bg-red-50 transition-all">
                                    ✖
                                </button>
                            </form>

                        </div>
                        @endforeach

                    </div>
                </div>
            </div>

            {{-- RIGHT SIDE --}}
            <div class="space-y-8">

                @php
                    $rate = ($classe->students->count() / 30) * 100;
                @endphp

                <div class="bg-white rounded-[2.5rem] border border-slate-200 p-10 shadow-sm">
                    <h3 class="text-[10px] font-black uppercase tracking-[0.2em] text-blue-600 mb-8 italic">Data & Stats</h3>

                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 italic">Taux d'occupation</p>

                    <p class="text-4xl font-black text-slate-900 tracking-tighter italic leading-none">
                        {{ round($rate) }}<span class="text-slate-300 text-2xl">%</span>
                    </p>

                    <div class="w-full bg-slate-100 h-1.5 rounded-full mt-5 overflow-hidden">
                        <div class="bg-blue-600 h-full rounded-full transition-all duration-1000"
                             style="width: {{ $rate }}%"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>

@endsection
