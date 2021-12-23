<?php

namespace App\Http\Controllers\Subcategories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoriesIndexController extends Controller
{
    public function index($id)
    {
        $category = Category::find($id);
        $subcategories = Subcategory::where('category_id', '=', $id)->get();
        return view('subcategories.index', compact('subcategories', 'id', 'category'));
    }
}
