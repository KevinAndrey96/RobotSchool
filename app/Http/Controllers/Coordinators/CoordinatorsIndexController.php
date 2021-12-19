<?php

namespace App\Http\Controllers\Coordinators;

use App\Http\Controllers\Controller;
use App\Models\Coordinator;
use App\Models\User;
use Illuminate\Http\Request;

class CoordinatorsIndexController extends Controller
{
    public function index()
    {
        $coordinators = User::where('role', 'like', 'Coordinator')->get();
        return view('coordinators.index', compact('coordinators'));
    }
}
