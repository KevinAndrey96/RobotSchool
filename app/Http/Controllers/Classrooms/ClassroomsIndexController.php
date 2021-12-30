<?php

namespace App\Http\Controllers\Classrooms;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassroomsIndexController extends Controller
{
    public function index()
    {
        if (Auth::user()->can('seeClassrooms')) {
            $classrooms = Classroom::all();
            return view('classrooms.index', compact('classrooms'));
        }
        abort(403);
    }
}
