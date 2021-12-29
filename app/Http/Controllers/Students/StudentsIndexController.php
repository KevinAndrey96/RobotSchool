<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentsIndexController extends Controller
{
    public function index()
    {
       $students = User::where('role', 'like', 'Student')->get();
       return view('students.index', compact('students'));
    }
}
