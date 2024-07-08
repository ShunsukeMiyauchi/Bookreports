<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Book;

class InvoicePaid extends Notification implements ShouldQueue
{
    use Queueable;

    //$user->notify(new InvoicePaid($invoice));
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Book $deadline)
    {
        //
        $this->book = $deadline;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array<int, string>
     */
    public function via($notifiable): array
    {
        return  ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('返却期限が近づいている本があります')
                    ->line('氏名:' . $notifiable->name)
                    ->line('本のid:' . $this->book->id)
                    ->line('タイトル:' . $this->book->title)
                    ->line('返却期限:' . $this->book->return_at)
                    ->line('期限を過ぎぬようご返却をお願いいたします。');
                    //->action('Notification Action', url('/'))
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
