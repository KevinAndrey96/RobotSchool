<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentsEditController extends Controller
{
    public function edit($id)
    {
        $user = User::find($id);
        $student = Student::where('user_id', '=', $user->id)->first();
        $school_id = $student->school_id;
        $classrooms = Classroom::where('school_id', '=', $school_id)->get();

        return view('students.edit', compact('user', 'student', 'school_id', 'classrooms', 'id'));
    }
}
