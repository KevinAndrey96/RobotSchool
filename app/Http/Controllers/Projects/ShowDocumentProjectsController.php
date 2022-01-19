<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ShowDocumentProjectsController extends Controller
{
    public function showDocument($id)
    {
        $project = Project::find($id);

        return view('projects.showDocument', compact('project'));
    }
}
