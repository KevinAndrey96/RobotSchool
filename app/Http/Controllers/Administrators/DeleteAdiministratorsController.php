<?php

namespace App\Http\Controllers\Administrators;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DeleteAdiministratorsController extends Controller
{
    public function delete(Request $request)
    {
        User::destroy($request->input('user_id'));

        return redirect('/administrators')->with('DeleteStudentSuccess', 'Administrador eliminado');
    }
}
