<?php

namespace App\Http\Controllers\Administrators;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StoreAdiministratorsController extends Controller
{
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->is_enable = 1;
        $user->role = 'Administrator';
        $user->password = Hash::make($request->input('password'));
        $user->save();
        $user->assignRole('Administrator');

        return redirect('/administrators')->with('StoreAdministratorsSuccess', 'Administrador agregado');
    }
}
