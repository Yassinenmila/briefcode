<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classe;
use App\Models\User;

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
        $classe = Classe::with(['teachers', 'students'])->findOrFail($id);
        return view ('Admin.classe.show', compact('classe'));
    }

    public function edit(string $id)
    {
    $classe = Classe::with(['teachers', 'students'])->findOrFail($id);

    $formateurs = User::where('roles', 'teacher')->get();

    $eleves = $classe->students()->where('roles', 'student')->get();

        return view('Admin.classe.edit', compact('classe', 'formateurs', 'eleves'));
    }

    public function update(Request $request, string $id)
    {
        $classe = Classe::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'promotion' => 'required|string|max:255',
            'description' => 'nullable|string',
            'formateurs' => 'nullable|array',       
            'formateurs.*' => 'exists:users,id',
        ]);

        $classe->update([
            'name' => $validated['name'],
            'promotion' => $validated['promotion'],
            'description' => $validated['description'] ?? null,
        ]);

        $classe->teachers()->sync($validated['formateurs'] ?? []);

        return redirect()->route('classes.index')->with('success', 'Classe mise à jour avec succès.');
    }

    public function destroy(string $id){
        $classe = Classe::findOrFail($id);
        $classe->delete();
        return redirect()->route('classes.index')->with('success', 'Classe supprimée avec succès.');
    }
}
