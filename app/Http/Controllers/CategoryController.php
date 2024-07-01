<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    
    public function index(Category $category)
    {
        return view('Category.index')->with(['books' => $category->getByCategory()]);
    }
    
    public function category(Category $category)
    {
        return view('Category.change')>with(['categories' => $category]);
        //現在の本リスト画面
    }
    
    //新規カテゴリーのpostをする際は(CategoryRequest $request Category $category)
    
    public function store(Category $category, CategoryRequest $request) // 引数をRequestからPostRequestにする
    {
        $input = $request['category'];
        $category->fill($input)->save();
        return redirect('/list/category{category}');
    }
    
}
