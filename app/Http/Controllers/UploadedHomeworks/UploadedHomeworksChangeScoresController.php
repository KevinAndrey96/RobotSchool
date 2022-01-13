<?php

namespace App\Http\Controllers\UploadedHomeworks;

use App\Http\Controllers\Controller;
use App\Models\Uploaded_homework;
use Illuminate\Http\Request;

class UploadedHomeworksChangeScoresController extends Controller
{
    public function changeScores(Request $request)
    {
        //return $request;
        $ids = explode(',', $request->input('ids'));
        $scores = explode(',', $request->input('scores'));
        for ($i=0; $i<count($ids); $i++) {
            if ($scores[$i] != "") {
               $uphomework =  Uploaded_homework::find($ids[$i]);
               $uphomework->score = $scores[$i];
               $uphomework->save();
            }
        }

        return back()->with('UpdaUphomeworksSuccess', 'Calificaciones registradas');
    }
}
