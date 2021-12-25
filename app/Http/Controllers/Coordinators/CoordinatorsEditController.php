<?php

namespace App\Http\Controllers\Coordinators;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoordinatorsEditController extends Controller
{
    public function edit($id)
    {
        if(Auth::user()->can('editCoordinators')) {
        $user = User::find($id);
        $schools = School::all();

        return view('coordinators.edit', compact('user', 'schools','id'));
        }
        abort(403);
    }
}
