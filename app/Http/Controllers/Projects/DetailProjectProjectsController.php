<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class DetailProjectProjectsController extends Controller
{
    public function detailProject($id)
    {
        $project = Project::find($id);

        return view('projects.detailProject', compact('project'));
    }
}
