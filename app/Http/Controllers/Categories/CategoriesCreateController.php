<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesCreateController extends Controller
{
    public function create()
    {
        return view('categories.create');
    }
}
