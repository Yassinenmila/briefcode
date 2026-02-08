@extends('layouts.admin')

@section('admincontent')

    <main class="flex-1 min-h-screen">
        <header class="bg-white border-b border-slate-200 px-8 py-4 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">Utilisateurs</h1>
                <p class="text-sm text-slate-500">Gérez les membres de votre équipe et leurs permissions.</p>
            </div>
            <div class="flex items-center gap-3">
                <a  href='{{ route('users.create') }}' class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-semibold text-sm flex items-center gap-2 transition-all">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Ajouter un utilisateur
                </a>
            </div>
        </header>

        <div class="p-8">
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                <div class="p-4 border-b border-slate-100 flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div class="relative w-full md:w-96">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        </span>
                        <input type="text" placeholder="Rechercher par nom ou email..." class="pl-10 w-full pr-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>
                    <form method="GET" action="{{ route('users.index') }}">
                        <select name="role" onchange="this.form.submit()" class="bg-slate-50 border border-slate-200 rounded-lg px-3 py-2 text-sm outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Tous les rôles</option>
                            <option value="admin" {{ request('role')=='admin' ? 'selected' : '' }}>Admin</option>
                            <option value="formateur" {{ request('role')=='teacher' ? 'selected' : '' }}>Teacher</option>
                            <option value="etudiant" {{ request('role')=='student' ? 'selected' : '' }}>Student</option>
                        </select>
                    </form>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-slate-50 text-slate-500 uppercase text-xs font-bold">
                            <tr>
                                <th class="px-6 py-4">Utilisateur</th>
                                <th class="px-6 py-4">Rôle</th>
                                <th class="px-6 py-4">Cin</th>
                                <th class="px-6 py-4">Telephone</th>
                                <th class="px-6 py-4 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach( $users as $u)
                                <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold">{{ substr($u->nom, 0, 2) }}</div>
                                            <div>
                                                <p class="font-bold text-slate-800 text-sm">{{ $u->prenom }} {{ $u->nom }}</p>
                                                <p class="text-xs text-slate-500">{{ $u->email }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center gap-1.5 py-1 px-2.5 rounded-full text-xs font-medium bg-slate-100 text-slate-600">
                                            <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> {{ $u->roles}}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-sm font-medium text-slate-700">{{ $u->cin }}</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-slate-500 italic">{{ $u->telephone }}</td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="{{ route('users.edit', $u->id) }}" class="text-slate-400 hover:text-blue-600 px-2 transition-colors">
                                            Modifier
                                        </a>
                                        <form action="{{ route('users.destroy', $u->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Supprimer cet utilisateur ?')" class="text-slate-400 hover:text-red-600 px-2 transition-colors">
                                                Supprimer
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if ($users->hasPages())
                        <div class="mt-4">
                            {{ $users->links('vendor.pagination.tailwind') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
