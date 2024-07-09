<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\Information;

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
        $book=Book::find(1);
        $notification = new Information($book);
				// 3. send mail
        Mail::send( $notification );
                    // 4.supplement:you can also add addres in here
            			// Mail::to($request->test1)
            			//     ->cc($request->test2)
            			//     ->bcc($request->test3)
            			//     ->send($welcomeMail);
        //return Command::SUCCESS;
    }
}
