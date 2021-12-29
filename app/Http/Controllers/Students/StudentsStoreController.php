<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentsStoreController extends Controller
{

    public function store(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $password = bcrypt($request->input('password'));
        $school_id = $request->input('school_id');
        $classrooms = Classroom::where('school_id', '=', $school_id)->get();

        return view('students.chooseClassroom', compact('name', 'email', 'phone', 'password', 'school_id', 'classrooms'));
    }
}
