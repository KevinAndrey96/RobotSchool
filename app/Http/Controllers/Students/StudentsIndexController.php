<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentsIndexController extends Controller
{
    public function index($id)
    {
        if (Auth::user()->can('seeStudents')) {

            $coordinator = User::find(Auth::user()->id);
            $students = User::where('role', 'like', 'Student')->get();

            if ($id == 'all') {
                foreach ($students as $index => $student) {
                    if ($student->student->school_id != $coordinator->coordinator->school_id) {
                        $students->pull($index);
                    }
                }

                return view('students.index', compact('students', 'coordinator'));
            }
            $classroom = Classroom::find($id);
            foreach ($students as $index => $student) {
                if ($student->student->school_id != $coordinator->coordinator->school_id
                    || $student->student->classroom_id != $classroom->id) {
                    $students->pull($index);
                }
            }

            return view('students.index', compact('students', 'coordinator'));
        }
        abort(403);
    }
}
