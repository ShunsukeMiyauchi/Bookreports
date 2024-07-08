// <?php

// namespace App\Jobs;

// use Illuminate\Bus\Queueable;
// use Illuminate\Contracts\Queue\ShouldBeUnique;
// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Foundation\Bus\Dispatchable;
// use Illuminate\Queue\InteractsWithQueue;
// use Illuminate\Queue\SerializesModels;

// class ProcessNotification implements ShouldQueue
// {
//     use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

//     /*
//     notification instance
//     */
//     public $notificaiton;
    
//     /**
//      * Create a new job instance.
//      *
//      * @return void
//      */
//     public function __construct(Book $notification)
//     {
//         //
//         $this->notificaiton=$notification;
//     }

//     /**
//      * Execute the job.
//      *
//      * @return void
//      */
//     public function handle(Book $invoice)
//     {
//         //
//     }
// }
