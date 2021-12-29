<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;

class StudentsCreateController extends Controller
{
    public function create()
    {
        $schools = School::all();
        return view('students.create', compact('schools'));
    }
}
