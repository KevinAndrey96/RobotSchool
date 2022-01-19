<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateProjectsController extends Controller
{
    public function create($id)
    {
        return view('projects.create', compact('id'));
    }
}
