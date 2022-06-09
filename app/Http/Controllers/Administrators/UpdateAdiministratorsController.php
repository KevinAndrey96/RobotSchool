<?php

namespace App\Http\Controllers\Administrators;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UpdateAdiministratorsController extends Controller
{
    public function update(Request $request)
    {
        $user = User::find($request->input('user_id'));
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        if (isset($request->password)) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->save();

        return redirect('/administrators')->with('UpdateAdministratorsSuccess', 'Administrador modificado');
    }
}
