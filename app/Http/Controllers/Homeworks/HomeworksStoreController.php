<?php

namespace App\Http\Controllers\Homeworks;

use App\Http\Controllers\Controller;
use App\Models\Homework;
use App\Models\Uploaded_homework;
use App\Models\User;
use Illuminate\Http\Request;

class HomeworksStoreController extends Controller
{
    public function store(Request $request)
    {
        $homework = new Homework();
        $homework->title = $request->input('title');
        $homework->description = $request->input('description');
        $homework->due_date = $request->input('due_date');
        $homework->due_time = $request->input('due_time');
        $homework->classroom_id = $request->input('classroom_id');
        $homework->save();
        $students = User::where('role', 'like', 'Student')->get();
        $classroom_id = $request->input('classroom_id');
        foreach ($students as $index => $student) {
            if ($student->student->classroom_id != $classroom_id) {
                $students->pull($index);
            }
        }
        foreach ($students as $student) {
            $uploaded_homework = new Uploaded_homework();
            $uploaded_homework->path = null;
            $uploaded_homework->score = 0;
            $uploaded_homework->homework_id = $homework->id;
            $uploaded_homework->user_id = $student->id;
            $uploaded_homework->save();
        }

        return redirect('/homeworks/'.$request->input('classroom_id'))->with('StoreHomeworkSuccess', 'Tarea creada');
    }
}
