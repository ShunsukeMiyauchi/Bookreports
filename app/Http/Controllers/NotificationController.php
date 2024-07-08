// <?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
// use App\Jobs\ProcessNotification;
// use App\Models\Book;

// class NotificationController extends Controller
// {
//     /**
//      * 新しいnotificationの保存
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function store(Request $request)
//     {
//         $notificaiton = Book::create(/* ... */);

//         // ...

//         ProcessNotificaiton::dispatch($notificaiton);
//     }
// }
