@extends('layouts.admin')

@section('admincontent')

    <main class="flex-1 min-h-screen">
        <header class="bg-white border-b border-slate-200 px-8 py-4 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">Utilisateurs</h1>
                <p class="text-sm text-slate-500">Gérez les membres de votre équipe et leurs permissions.</p>
            </div>
            <div class="flex items-center gap-3">
                <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-semibold text-sm flex items-center gap-2 transition-all">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Ajouter un utilisateur
                </button>
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
                    <div class="flex items-center gap-2">
                        <select class="bg-slate-50 border border-slate-200 rounded-lg px-3 py-2 text-sm outline-none focus:ring-2 focus:ring-blue-500">
                            <option>Tous les rôles</option>
                            <option>Admin</option>
                            <option>Éditeur</option>
                            <option>Client</option>
                        </select>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-slate-50 text-slate-500 uppercase text-xs font-bold">
                            <tr>
                                <th class="px-6 py-4">Utilisateur</th>
                                <th class="px-6 py-4">Rôle</th>
                                <th class="px-6 py-4">Statut</th>
                                <th class="px-6 py-4">Dernière connexion</th>
                                <th class="px-6 py-4 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <img src="https://i.pravatar.cc/150?u=1" class="h-10 w-10 rounded-full object-cover shadow-sm" alt="">
                                        <div>
                                            <p class="font-bold text-slate-800 text-sm">Sophie Martin</p>
                                            <p class="text-xs text-slate-500">sophie.m@exemple.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm font-medium text-slate-700">Administrateur</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1.5 py-1 px-2.5 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-green-600"></span> Actif
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-500 italic">Il y a 12 min</td>
                                <td class="px-6 py-4 text-right">
                                    <button class="text-slate-400 hover:text-blue-600 px-2 transition-colors">Modifier</button>
                                    <button class="text-slate-400 hover:text-red-600 px-2 transition-colors">Supprimer</button>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold">TL</div>
                                        <div>
                                            <p class="font-bold text-slate-800 text-sm">Thomas Legrand</p>
                                            <p class="text-xs text-slate-500">thomas.l@agence.fr</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm font-medium text-slate-700">Éditeur</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1.5 py-1 px-2.5 rounded-full text-xs font-medium bg-slate-100 text-slate-600">
                                        <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Hors ligne
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-500 italic">Hier, à 18:30</td>
                                <td class="px-6 py-4 text-right">
                                    <button class="text-slate-400 hover:text-blue-600 px-2 transition-colors">Modifier</button>
                                    <button class="text-slate-400 hover:text-red-600 px-2 transition-colors">Supprimer</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="p-4 border-t border-slate-100 flex items-center justify-between">
                    <p class="text-sm text-slate-500">Affichage de 1 à 10 sur 45 utilisateurs</p>
                    <div class="flex gap-2">
                        <button class="px-4 py-2 border border-slate-200 rounded-lg text-sm font-medium hover:bg-slate-50 transition-all">Précédent</button>
                        <button class="px-4 py-2 bg-slate-900 text-white rounded-lg text-sm font-medium hover:bg-slate-800 transition-all">Suivant</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection