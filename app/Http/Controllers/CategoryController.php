<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    
    public function index(Category $category)
    {
        return view('Category.index')->with(['books' => $category->getByCategory()]);
    }
    
    public function category(Category $category)
    {
        return view('Category.Category')>with(['categories' => $category]);
        //現在の本リスト画面
    }
    
}
