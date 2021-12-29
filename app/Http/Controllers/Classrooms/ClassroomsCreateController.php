<?php

namespace App\Http\Controllers\Classrooms;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ClassroomsCreateController extends Controller
{
    public function create()
    {
        $teachers = User::where('role', 'like', 'Teacher')->get();
        return view('classrooms.create', compact('teachers'));
    }
}
