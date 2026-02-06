@extends('layouts.admin')

@section('admincontent')
<main class="flex-1 min-h-screen bg-[#f8fafc] p-8 lg:p-12">

    <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-12">
        <div>
            <div class="flex items-center gap-3 mb-2">
                <span class="w-12 h-1.5 bg-emerald-500 rounded-full"></span>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] italic">Technical Stack</p>
            </div>
            <h1 class="text-5xl font-black text-slate-900 uppercase tracking-tighter italic leading-none">
                Skill <span class="text-emerald-500">Registry</span>
            </h1>
        </div>
        <a href="{{ route('competences.create') }}" class="bg-slate-900 hover:bg-emerald-600 text-white px-8 py-4 rounded-2xl text-[10px] font-black uppercase tracking-widest transition-all shadow-xl active:scale-95">
            Nouvelle Compétence +
        </a>
    </div>

    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

        @foreach($competences as $competence)
        <div class="group bg-white rounded-[2.5rem] border border-slate-200 p-8 hover:shadow-2xl hover:border-emerald-500/20 transition-all flex flex-col relative overflow-hidden">

            <div class="absolute top-6 right-8">
                <span class="px-3 py-1 bg-emerald-50 text-emerald-600 text-[9px] font-black uppercase tracking-widest rounded-lg border border-emerald-100">
                    {{ $competence->type }}
                </span>
            </div>

            <div class="relative z-10 space-y-6">
                <div>
                    <p class="text-[10px] font-black text-slate-300 uppercase tracking-[0.2em] mb-1 italic">Reference Code</p>
                    <h3 class="text-3xl font-black text-slate-900 uppercase tracking-tighter group-hover:text-emerald-600 transition-colors italic">
                        {{ $competence->code }}
                    </h3>
                </div>

                <div class="min-h-[60px]">
                    <p class="text-slate-500 text-sm font-medium leading-relaxed italic">
                        {{ $competence->description }}
                    </p>
                </div>

                <div class="pt-6 border-t border-slate-50 flex items-center justify-between">
                    <div class="flex items-center gap-4 text-slate-300 group-hover:text-slate-400 transition-colors italic text-[10px] font-black uppercase tracking-widest">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        Verified Skill
                    </div>

                    <div class="flex gap-2">
                        <a href="{{ route('competences.edit', $competence->id) }}" class="p-3 bg-slate-50 text-slate-400 hover:text-blue-500 hover:bg-blue-50 rounded-xl transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                        </a>
                        <form action="{{ route('competences.destroy', $competence->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="p-3 bg-slate-50 text-slate-400 hover:text-red-500 hover:bg-red-50 rounded-xl transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6"/></svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</main>
@endsection
