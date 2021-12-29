<?php

namespace App\Http\Controllers\Classrooms;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomsIndexController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::all();
        return view('classrooms.index', compact('classrooms'));
    }
}
