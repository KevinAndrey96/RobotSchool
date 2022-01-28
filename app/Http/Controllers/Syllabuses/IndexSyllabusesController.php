<?php

namespace App\Http\Controllers\Syllabuses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexSyllabusesController extends Controller
{
    public function index(Request $request)
    {
        $classroom_id = $request->input('classroom_id');

        return view('syllabuses.index', compact('classroom_id'));
    }
}
