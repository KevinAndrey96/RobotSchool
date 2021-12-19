<?php

namespace App\Http\Controllers\Coordinators;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CoordinatorsDeleteController extends Controller
{
    public function delete(Request $request)
    {
        User::destroy($request->input('user_id'));
        return redirect('/coordinators')->with('deletecoordinatorsuccess','Coordinador eliminado');
    }
}
