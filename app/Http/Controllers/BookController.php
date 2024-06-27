<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function schedule(Book $scheduling)
    {
        return view('Book.Schedule');
        //スケジュール画面
    }
    
    public function listing(Book $book)
    {
        return view('Book.List')->with(['books' => $book->get()]);
        //スケジュール画面
    }
    
     public function accompany(Book $accompany)
    {
        return view('Book.Accompany')->with(['accompanies' => $accompany]);
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
        $book->user_id = $input[''];
        $book->category_id = $input[''];
        $book->title = $input['title'];
        $book->borrow_at = $input['borrow_at'];
        $book->return_at = $input['return_at'];
        $book->save();
        return redirect('/newbook' . $book->id);
    }
}
