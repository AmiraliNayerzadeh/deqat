<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $category = Category::latest()->paginate(21);
        return view('home.category.index', compact('category'));
    }


    public function archive(Category $category)
    {
        return view('home.category.archive', compact('category'));

    }
}
