<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompetenceController extends Controller
{

    public function index()
    {
        $competences = \App\Models\Competence::all();
        return view('Admin.competence.index', compact('competences'));
    }

    public function create()
    {
        return view('Admin.competence.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        \App\Models\Competence::create($request->all());

        return redirect()->route('competences.index')->with('success', 'Competence created successfully.');
    }

    public function edit(string $id)
    {
        $competence = \App\Models\Competence::findOrFail($id);
        return view('Admin.competence.edit', compact('competence'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'code' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $competence = \App\Models\Competence::findOrFail($id);
        $competence->update($request->all());

        return redirect()->route('competences.index')->with('success', 'Competence updated successfully.');
    }

    public function destroy(string $id)
    {
        $competence = \App\Models\Competence::findOrFail($id);
        $competence->delete();

        return redirect()->route('competences.index')->with('success', 'Competence deleted successfully.');
    }
}
