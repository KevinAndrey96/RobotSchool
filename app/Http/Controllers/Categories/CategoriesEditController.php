<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesEditController extends Controller
{
    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.edit', compact('category'));

    }
}
