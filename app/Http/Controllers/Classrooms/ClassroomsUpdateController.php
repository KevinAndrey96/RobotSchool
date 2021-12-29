<?php

namespace App\Http\Controllers\Classrooms;

use App\Http\Controllers\Controller;
use App\UseCases\Contracts\Classrooms\UpdateClassroomsUseCaseInterface;
use Illuminate\Http\Request;

class ClassroomsUpdateController extends Controller
{
    private UpdateClassroomsUseCaseInterface $updateClassroomsUseCase;

    public function __construct(UpdateClassroomsUseCaseInterface $updateClassroomsUseCase)
    {
        $this->updateClassroomsUseCase = $updateClassroomsUseCase;
    }

    public function update(Request $request): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $this->updateClassroomsUseCase->handle(
          $request->input('name'),
          $request->input('code'),
          $request->input('user_id'),
          $request->input('classroom_id')
        );

        return redirect('/classrooms')->with('updaclasssuccess', 'Aula modificada');
    }
}
