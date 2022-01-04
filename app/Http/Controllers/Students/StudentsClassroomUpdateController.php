<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentsClassroomUpdateController extends Controller
{
    public function classroomUpdate(Request $request)
    {
        $ids = explode(',',$request->input('cart'));

        if ($ids[0] == "") {
            return redirect('/students/transfers')->with('transfersError', 'No selecciono ningun estudiante');
        }

        foreach($ids as $id){
           $user = User::find($id);
           $student = Student::where('user_id', '=', $user->id)->first();
           $student->classroom_id = $request->input('classroom_id');
           $student->save();
        }

        return redirect('/students/all')->with('transfersSuccess', 'Transferencias exitosas');
    }
}
