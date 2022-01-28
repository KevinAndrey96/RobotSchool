<?php

namespace App\Http\Controllers\Syllabuses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreSyllabusesController extends Controller
{
    public function store(Request $request)
    {
        dd($request);
        return $request;
    }
}
