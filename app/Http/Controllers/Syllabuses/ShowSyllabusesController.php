<?php

namespace App\Http\Controllers\Syllabuses;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Project;
use App\Models\Syllabus;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class ShowSyllabusesController extends Controller
{
    public function show($id)
    {
        $subcategories = Array();
        $classroom = Classroom::find($id);
        $syllabus = Syllabus::where('classroom_id', $id)->get();
        foreach ($syllabus as $value) {
            $mysubcategory = $value->project->subcategory;
            if (empty($subcategories)) {
                array_push($subcategories, $mysubcategory);
            } else {
                foreach ($subcategories as $subcategory) {
                    if ($subcategory->id == $mysubcategory->id) {
                        break;
                    }
                    array_push($subcategories, $mysubcategory);
                }
            }
            return $subcategories;
        }
        //$pdf = PDF::loadView('syllabus.show',compact('classroom', 'syllabus' ));
        //return $pdf->stream('theme'.$id.'.pdf');
    }
}
