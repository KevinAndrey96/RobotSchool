<?php

namespace App\Http\Controllers\Homeworks;

use App\Http\Controllers\Controller;
use App\Models\Homework;
use Illuminate\Http\Request;

class HomeworksEditController extends Controller
{
    public function edit($id)
    {
      $homework = Homework::find($id);

      return view('homeworks.edit', compact('homework', 'id'));
    }
}
