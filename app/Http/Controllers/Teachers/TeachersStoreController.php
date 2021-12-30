<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\UseCases\Contracts\Teachers\StoreTeachersUseCaseInterface;
use Illuminate\Http\Request;

class TeachersStoreController extends Controller
{

    private StoreTeachersUseCaseInterface $storeTeachersUseCase;

    public function __construct(StoreTeachersUseCaseInterface $storeTeachersUseCase){
        $this->storeTeachersUseCase = $storeTeachersUseCase;
    }

    public function store(Request $request)
    {
           $this->storeTeachersUseCase->handle(
           $request->input('name'),
           $request->input('email'),
           $request->input('phone'),
           $request->input('password'),
           true
       );

           return redirect('/teachers')->with('storeteachersuccess', 'Profesor agregado');

    }

}
