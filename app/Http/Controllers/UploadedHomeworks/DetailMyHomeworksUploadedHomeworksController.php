<?php

namespace App\Http\Controllers\UploadedHomeworks;

use App\Http\Controllers\Controller;
use App\Models\Uploaded_homework;
use Illuminate\Http\Request;

class DetailMyHomeworksUploadedHomeworksController extends Controller
{
    public function detailMyHomework($id)
    {
        $uploadedHomework = Uploaded_homework::find($id);
        $homework = $uploadedHomework->homework;
        return view('uploadedHomeworks.detailMyHomework', compact('uploadedHomework', 'homework'));
    }
}
