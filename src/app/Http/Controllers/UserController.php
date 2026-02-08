<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request){

        $query = User::query();

        if ($request->filled('role')) {
            $query->where('roles', $request->role);
        }

        $users = $query->latest()->paginate(10);

        return view('Admin.users.index',compact('users'));
    }

    public function create(){

        return view('Admin.forclass');
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

    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
