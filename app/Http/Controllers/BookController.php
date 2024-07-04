<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Category;


class BookController extends Controller
{
    
    public function listing(Book $book, Category $category)
    {
        //dd($book);
        return view('Book.List')->with(['books' => $book->get(), 'categories' => $category->get()]);
        //登録されている本画面(メインメニュー)
    }
    
    public function update(Book $book, BookRequest $request)
     { 
        
        $input = $request['book'];
        $book['category_id'] = $input['category_id'];
        $book->save();
        return redirect('/listbook');
    }
    
    public function delete(Book $book)
    {
        //dd($book);
        $book->delete();
        //dd($book);
        return redirect('/listbook');
    }
    
    public function schedule(Book $book)
    {
        dd($book);
        //$book= Book::find(1);
        return view('Book.Schedule')->with(['book' => $book->get()]);
        //'id'->$book['id'],
        //'title'->$book['title'],
        //'start'->$book['borrow_at'],
        //'end'->$book['return_at'],
        //)->get();
    }
    
    public function newbook(Category $category)
    {
        return view('Book.Newbook')->with(['categories' => $category->get()]);
        //本登録画面
    }
    
    public function store(Book $book, BookRequest $request)
    {
        //dd($request);
        $input = $request['book'];
        $input += ['user_id' => $request->user()->id]; 
        $book->fill($input)->save();
        return redirect('/listbook');
    }
    
}
