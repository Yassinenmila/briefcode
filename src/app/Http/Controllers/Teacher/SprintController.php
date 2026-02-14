<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sprint;

class SprintController extends Controller
{

    public function index(Request $request)
    {
        $query=Sprint::with('competences');

        if($request->filled('start_date')){
            $query->whereDate('start_date',$request->start_date);
        }

        $sprints=$query->orderBy('start_date','desc')->get();

        return view('teacher.sprint.index',compact('sprints'));
    }

    public function show(string $id)
    {
        $sprint=Sprint::with('competences')->findOrfail($id);
        return view('teacher.sprint.show',compact('sprint'));
    }

}
