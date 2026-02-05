@if ($paginator->hasPages())
    <div class="flex items-center justify-between px-4 py-3 bg-white border-t border-slate-100 sm:px-6">

        {{-- Infos --}}
        <div class="text-sm text-slate-500">
            Affichage de
            <span class="font-semibold text-slate-700">{{ $paginator->firstItem() }}</span>
            à
            <span class="font-semibold text-slate-700">{{ $paginator->lastItem() }}</span>
            sur
            <span class="font-semibold text-slate-700">{{ $paginator->total() }}</span>
            utilisateurs
        </div>

        {{-- Boutons --}}
        <div class="flex gap-2">

            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <span class="px-4 py-2 border border-slate-200 rounded-lg text-sm text-slate-400 cursor-not-allowed">
                    Précédent
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                   class="px-4 py-2 border border-slate-200 rounded-lg text-sm font-medium hover:bg-slate-50 transition-all">
                    Précédent
                </a>
            @endif

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                   class="px-4 py-2 bg-slate-900 text-white rounded-lg text-sm font-medium hover:bg-slate-800 transition-all">
                    Suivant
                </a>
            @else
                <span class="px-4 py-2 bg-slate-300 text-white rounded-lg text-sm cursor-not-allowed">
                    Suivant
                </span>
            @endif

        </div>
    </div>
@endif
