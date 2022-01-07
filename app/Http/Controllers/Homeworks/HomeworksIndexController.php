<?php

namespace App\Http\Controllers\Homeworks;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Homework;
use App\Models\Uploaded_homework;
use Illuminate\Http\Request;

class HomeworksIndexController extends Controller
{
    public function index($id)
    {
        if ($id == 'all') {
            $homeworks = Homework::all();
            return view('homeworks.index', compact('homeworks'));
        }
        $classroom = Classroom::find($id);
        $homeworks = Homework::where('classroom_id', '=', $id)->get();

        return view('homeworks.index', compact('homeworks', 'id', 'classroom'));

        /*
        $uploaded_homeworks = Uploaded_homework::where('user_id', '=', $id)->get();

        return $uploaded_homeworks;
        */
    }
}
