<?php

namespace App\Http\Controllers\Schools;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;

class SchoolDeleteController extends Controller
{
    public function delete(Request $request)
    {
        School::destroy($request->input('school_id'));
        return back()->with('deleschoolsuccess', 'Colegio eliminado');
    }
}
