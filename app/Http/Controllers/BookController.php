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
    
    public function schedule(Book $request)
    {
        return view('Book.Schedule');
    }
    
    public function getEvent(Book $book, Request $request)
    {
        $bookdata=$book->get();
        //dd($bookdata);
        //dd($request);
        $start_date = date('Y-m-d', $request->input('start_date') / 1000);
        $end_date = date('Y-m-d', $request->input('end_date') / 1000);

        return Book::query()
            ->select(
                'borrow_at as start',
                'return_at as end',
                'title as title',
                'id'
            )
            ->where('return_at', '>', $start_date)
            ->where('borrow_at', '<', $end_date)
            ->get();
    }
    
    public function newbook(Category $category)
    {
        return view('Book.Newbook')->with(['categories' => $category->get()]);
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
