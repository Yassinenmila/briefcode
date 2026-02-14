<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classe;
use App\Models\User;

class ClasseController extends Controller
{
    public function index()
    {
        return view('teacher.classe.index');
    }

    public function show(string $id)
    {
        $classe=Classe::with(['teachers','students'])->findOrfail($id);
        return view('teacher.classe.show',compact('classe'));
    }

    public function edit(string $id)
    {
        $classe = Classe::with('students')->findOrFail($id);
        $available_students = User::where('roles', 'student')->whereDoesntHave('classe')->get();
        return view('teacher.classe.edit' , compact('classe','available_students'));
    }

    public function update(Request $request, string $id)
    {
        $classe= Classe::findOrfail($id);
        $data=$request->validate([
            'name' => 'required|string|max:255',
            'promotion' => 'required|string|max:255',
            'students' => 'nullable|array',
            'students.*' => 'exists:users,id',
        ]);

        $classe->update([
            'name'=>$data['name'],
            'promotion'=>$data['promotion'],
        ]);

        $classe->students()->sync($data['students'??[]]);

        return redirect()->route('teacher.classes.show',$classe->id)->with('success','Classe mise a jour avec succes !!');

    }
}
