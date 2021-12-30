<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentsCreateController extends Controller
{
    public function create()
    {
        if (Auth::user()->can('createStudents')) {
            $schools = School::all();
            return view('students.create', compact('schools'));
        }
        abort(403);
    }
}
