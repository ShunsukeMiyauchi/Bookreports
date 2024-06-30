<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;


class BookController extends Controller
{
    
    public function listing(Book $book)
    {
        return view('Book.List')->with(['books' => $book->get()]);
        //登録されている本画面(メインメニュー)
    }
    
    public function schedule(Book $scheduling)
    {
        return view('Book.Schedule');
        //スケジュール画面
    }
    
    public function newbook(Category $category)
    {
        return view('Book.Newbook')->with(['categories' => $category->get()]);
        //本登録画面
    }
    
    public function store(Request $request, Book $book)
    {
        $input = $request['book'];
        $input += ['user_id' => $request->user()->id]; 
        $book->fill($input)->save();
        return redirect('/listbook');
    }
}
