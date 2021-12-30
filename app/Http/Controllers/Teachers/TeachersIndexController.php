<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeachersIndexController extends Controller
{

    public function index()
    {
        if (Auth::user()->can('seeTeachers') ) {
            /**
             * @var TYPE_NAME $teachers
             */
            $coordinator = User::find(Auth::user()->id);
            $teachers = User::where('role', 'like', 'Teacher')->get();
            return view('teachers.index', compact('teachers', 'coordinator'));
        }
        abort(403);
    }
}
