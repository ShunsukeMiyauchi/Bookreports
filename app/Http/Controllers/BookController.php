<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function schedule(Book $schedule)
    {
        return view('Book.Schedule');
        //スケジュール画面
    }
    
    public function newbook(Book $newbook)
    {
        return view('Book.Newbook');
        //本登録画面
    }
    
    public function store(Request $request, Book $book)
    {
        $input = $request['book'];
        $book->fill($input)->save();
        return redirect('/newbook' . $book->id);
    }
}
