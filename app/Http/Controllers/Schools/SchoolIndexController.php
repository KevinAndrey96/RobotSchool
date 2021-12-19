<?php

namespace App\Http\Controllers\Schools;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;

class SchoolIndexController extends Controller
{
    public function index()
    {
        $schools = School::all();
        return view('Schools.index', compact('schools'));
    }
}
