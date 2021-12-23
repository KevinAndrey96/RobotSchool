<?php

namespace App\Http\Controllers\Subcategories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class SubcategoriesCreateController extends Controller
{
    public function create($id)
    {
        $categories = Category::all();
        return view('subcategories.create', compact('categories','id'));
    }
}
