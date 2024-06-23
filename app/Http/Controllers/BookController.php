<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function schedule(Book $schedule)
    {
        return view('Book.Schedule');
        //現在の本リスト画面
    }
    
    public function newbook(Book $newbook)
    {
        return view('Book.Newbook');
        //本登録画面
    }
}
