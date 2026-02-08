<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classe;

class ClasseController extends Controller
{

    public function index()
    {
        $classes=Classe::orderBy('promotion','desc')->get();

        return view('Admin.classe.index',compact('classes'));
    }

    public function create()
    {
        return view('Admin.classe.create');
    }

    public function store(Request $request)
    {
        $classe = new Classe();
        $classe->name = $request->input('name');
        $classe->promotion = $request->input('promotion');
        $classe->description = $request->input('description');
        $classe->save();

        return redirect()->route('classes.index')->with('success', 'Classe créée avec succès.');
    }

    public function show(string $id)
    {
        $classe = Classe::findOrFail($id);
        return view ('Admin.classe.show', compact('classe'));
    }

    public function edit(string $id)
    {
        $classe = Classe::findOrFail($id);
        return view('Admin.classe.edit', compact('classe'));
    }

    public function update(Request $request, string $id)
    {
        $classe = Classe::findOrFail($id);
        $classe->name = $request->input('name');
        $classe->promotion = $request->input('promotion');
        $classe->description = $request->input('description');
        $classe->save();

        return redirect()->route('classes.index')->with('success', 'Classe mise à jour avec succès.');
    }

    public function destroy(string $id){
        $classe = Classe::findOrFail($id);
        $classe->delete();
        return redirect()->route('classes.index')->with('success', 'Classe supprimée avec succès.');
    }
}
