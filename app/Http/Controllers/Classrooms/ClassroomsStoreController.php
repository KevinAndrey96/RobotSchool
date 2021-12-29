<?php

namespace App\Http\Controllers\Classrooms;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Teacher;
use App\UseCases\Contracts\Classrooms\StoreClassroomsUseCaseInterface;
use Illuminate\Http\Request;

class ClassroomsStoreController extends Controller
{
    private StoreClassroomsUseCaseInterface $storeClassroomsUseCase;
    /*
    public function __construct(StoreClassroomsUseCaseInterface $storeClassroomsUseCase)
    {
        $this->storeClassroomsUseCase = $storeClassroomsUseCase;
    }
    */

    public function store(Request $request)
    {
        $classroom = new Classroom();
        $classroom->name = $request->input('name');
        $classroom->code = $request->input('code');
        $classroom->user_id = $request->input('user_id');
        $teacher = Teacher::where('user_id', '=', $request->input('user_id'))->first();
        $classroom->school_id = $teacher->school_id;
        $classroom->save();
        return redirect('/classrooms')->with('storeclasssuccess','Aula agregada');
        /*
        $this->storeClassroomsUseCase->handle(
            $request->input('name'),
            $request->input('code'),
            $request->input('user_id')
        );
        */
    }
}
