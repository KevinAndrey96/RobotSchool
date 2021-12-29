<?php

namespace App\Http\Controllers\Classrooms;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\User;
use Illuminate\Http\Request;

class ClassroomsEditController extends Controller
{
    public function edit($id)
    {
        $teachers = User::where('role', 'like', 'Teacher')->get();
        $classroom = Classroom::find($id);
        return view('classrooms.edit', compact('classroom', 'teachers', 'id'));
    }
}
