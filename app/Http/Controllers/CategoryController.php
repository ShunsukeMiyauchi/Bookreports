<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function category(Category $category)
    {
        return view('Book.Category');
        //現在の本リスト画面
    }
}
