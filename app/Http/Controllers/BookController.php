<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\Information;

class BookController extends Controller
{
        public function hoge(){
        // 2. create instance
        $notification = new Information();
				// 3. send mail
        Mail::send( $notification );

				// 4.supplement:you can also add addres in here
				// Mail::to($request->test1)
				//     ->cc($request->test2)
				//     ->bcc($request->test3)
				//     ->send($welcomeMail);

				// 5. check success sending mail
				// if (count(Mail::failures()) > 0) {
    //             $message = 'メール送信に失敗しました';

				// // return 
				// return back()->withErrors($messages);
    //             }
    //             else{
    //                 $messages = 'メールを送信しました';
        
    //     						// 別のページに遷移する
    //     						return redirect()->route('hoge')->with(compact('messages'));
    //             }				
            }

    // public function sendmail(Book $book)
    // {
    //     $invoice = Book::find(1);
    //     //$user=User::find(1);
    //     //dd($invoice->user);
    //     //$user->notify(new InvoicePaid($invoice));
    //     return (new InvoicePaid($invoice))
    //                  ->toMail($invoice->user);
    // }
    
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
    
    public function getEvent(Request $request)
    {
        //$bookId = $this->add_schedule();
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
            ->where('registerd',true)
            ->get();
    }
    
    public function add_schedule(Book $book, Request $request)
    {
        $input = $request['book'];
        $book->registerd = $input['registerd'];
        $book->save();
        return redirect('/listbook');
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
