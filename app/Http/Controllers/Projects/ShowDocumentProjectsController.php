<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class ShowDocumentProjectsController extends Controller
{
    public function showDocument($id)
    {
        $project = Project::find($id);
        $pdf = PDF::loadView('projects.showDocument',compact('project'));

        return $pdf->stream('theme'.$id.'.pdf');
    }
}
