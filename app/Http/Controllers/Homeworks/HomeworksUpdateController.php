<?php

namespace App\Http\Controllers\Homeworks;

use App\Http\Controllers\Controller;
use App\Models\Homework;
use Illuminate\Http\Request;

class HomeworksUpdateController extends Controller
{
    public function update(Request $request)
    {
        $homework = Homework::find($request->input('homework_id'));
        $homework->title = $request->input('title');
        $homework->description = $request->input('description');
        $homework->due_date = $request->input('due_date');
        $homework->due_time = $request->input('due_time');
        $homework->save();

        return redirect('/homeworks/'.$homework->classroom_id)->with('UpdaHomeworkSuccess', 'Tarea modifcada');

    }
}
