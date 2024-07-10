<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\Information;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\Log;

class Notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '返却通知メールの送信';

    //protected $book;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $now = new DateTime('now');
        $now->setTimezone(new DateTimeZone('Asia/Tokyo')); 
      
        $futureDate = $now->modify('+2 days');
        $books=Book::whereDate('return_at','<=', $futureDate)->get();
        // $notifications =$books->map(function ($book){
        //       $notification=new Information($book);
        //       return $notification;
        // });
				// 3. send mail
		//Mail::to('miyashun1524@gmail.com')->send($notifications);
        //Mail::send( $notifications);
        Mail::send('mail.Notification', ['books' => $books], function ($message) {
        $message->to('miyashun1524@gmail.com')->subject('返却期限の通知');
                    // 4.supplement:you can also add addres in here
            			// Mail::to($request->test1)
            			//     ->cc($request->test2)
            			//     ->bcc($request->test3)
            			//     ->send($welcomeMail);
        //return Command::SUCCESS;
    });
    }
}
