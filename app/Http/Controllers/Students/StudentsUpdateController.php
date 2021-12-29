<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentsUpdateController extends Controller
{
    public function update(Request $request)
    {
        $user = User::find($request->input('user_id'));
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        if ($request->has('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->save();
        $student = Student::where('user_id', '=', $user->id)->first();
        $student->classroom_id = $request->input('classroom_id');
        $student->save();
        return redirect('/students')->with('UpdaStudentSuccess', 'Estudiante modificado');

    }
}
