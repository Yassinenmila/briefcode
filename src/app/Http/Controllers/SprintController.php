<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SprintController extends Controller
{

    public function index()
    {
        $sprints = \App\Models\Sprint::all();
        return view('Admin.sprint.index', compact('sprints'));
    }

    public function create()
    {
        return view('Admin.sprint.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sprint = new \App\Models\Sprint();
        $sprint->title = $request->input('title');
        $sprint->description = $request->input('description');
        $sprint->start_date = $request->input('start_date');
        $sprint->end_date = $request->input('end_date');
        $sprint->save();

        return redirect()->route('sprints.index')->with('success', 'Sprint créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sprint = \App\Models\Sprint::findOrFail($id);
        $Competences = $sprint->competences; 
        return view('Admin.sprint.show', compact('sprint', 'Competences'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sprint = \App\Models\Sprint::findOrFail($id);
        $Competences = \App\Models\Competence::all();
         return view('Admin.sprint.edit', compact('sprint', 'Competences'));
        return view('Admin.sprint.edit', compact('sprint'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sprint = \App\Models\Sprint::findOrFail($id);
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'competences' => 'array',
            'competences.*' => 'exists:competences,id',
        ]);
        $sprint->update($validate);

        $sprint->competences()->sync($validate['competences'] ?? []);

        return redirect()->route('sprints.index')->with('success', 'Sprint mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sprint = \App\Models\Sprint::findOrFail($id);
        $sprint->delete();

        return redirect()->route('sprints.index')->with('success', 'Sprint supprimé avec succès.');
    }
}
