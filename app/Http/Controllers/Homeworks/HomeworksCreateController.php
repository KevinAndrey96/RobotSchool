<?php

namespace App\Http\Controllers\Homeworks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeworksCreateController extends Controller
{
    public function create()
    {
        return view('homeworks.create');
    }
}
