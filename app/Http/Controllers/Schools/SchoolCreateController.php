<?php

namespace App\Http\Controllers\Schools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SchoolCreateController extends Controller
{
    public function create()
    {
        return view('Schools.create');
    }
}
