<?php

namespace App\Http\Controllers\Classrooms;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassroomsEditController extends Controller
{
    public function edit($id)
    {
        if (Auth::user()->can('editClassrooms')) {
            $teachers = User::where('role', 'like', 'Teacher')->get();
            $classroom = Classroom::find($id);
            return view('classrooms.edit', compact('classroom', 'teachers', 'id'));
        }
        abort(403);
    }
}
