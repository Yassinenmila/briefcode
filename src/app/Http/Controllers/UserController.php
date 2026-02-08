<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index(Request $request){

        $query =User::query();

        if ($request->filled('role')) {
            $query->where('roles', $request->role);
        }

        $users = $query->latest()->paginate(10);

        return view('Admin.users.index',compact('users'));
    }

    public function create(){

        return view('Admin.users.create');
    }

    public function store(Request $request){
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'date_naissance' => 'required|date',
            'cin' => 'required',
            'telephone' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'roles' => 'required|string',
        ]);

        User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'date_naissance' => $request->date_naissance,
            'cin' => $request->cin,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roles' => $request->roles,
        ]);

        return redirect()->route('users.index')->with('success', 'Utilisateur créé avec succès.');

    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id){
        $user = User::findOrFail($id);
        return view('Admin.users.modify', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'date_naissance' => 'required|date',
            'cin' => 'required',
            'telephone' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|confirmed|min:6',
            'roles' => 'required|string',
        ]);

        $user = User::findOrFail($id);
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->date_naissance = $request->date_naissance;
        $user->cin = $request->cin;
        $user->telephone = $request->telephone;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->roles = $request->roles;
        $user->save();

        return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
}
