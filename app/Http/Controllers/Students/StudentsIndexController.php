<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentsIndexController extends Controller
{
    public function index()
    {
        if (Auth::user()->can('seeStudents')) {
            $students = User::where('role', 'like', 'Student')->get();

            return view('students.index', compact('students'));
        }
        abort(403);
    }
}
