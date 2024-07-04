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
    
     public function make_delete(Category $category)
    {
        return view('Category.make&delete')->with(['categories' => $category->get()]);
    }
    
    public function delete(Category $category)
    {
        $category->timestamps = false; 
        $category->delete();
        //dd($book);
        return redirect('/listbook');
    }
    
    public function update(Category $category, CategoryRequest $request) // 引数をRequestからPostRequestにする
    {
        $category->timestamps = false;
        $input = $request['category'];
        $category->fill($input)->save();
        return redirect('/listbook');
    }
    
}
