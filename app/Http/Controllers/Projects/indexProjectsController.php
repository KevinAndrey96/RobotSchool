<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class indexProjectsController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->input('id');
        if ($id == 'all') {
            $projects = Project::all();
            return view('projects.index', compact('projects', 'id'));
        }
        $projects = Project::where('user_id', Auth::user()->id)->get();
        return view('projects.index', compact('projects','id'));
    }
}
