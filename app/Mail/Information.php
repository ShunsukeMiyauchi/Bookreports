<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Mail\InvoicePaid as InvoicePaidMailable;
use App\Models\Book;
//use App\Models\User;

class Information extends Mailable
{
    use Queueable, SerializesModels;
    
    /**
     * book instance
     *
     * @var \App\Models\Book
     */
    protected $book;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($book)
    {
        //
        $this->book=$book;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: '返却期限が近づいている本があります',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'mail.notification',
            with: [
                'title' => $this->book->title,
                'id' => $this->book->id,
                'return_at' => $this->book->return_at,
            ],
        );
    }
    
    public function build()
    {
        return $this->to('miyashun1524@gmail.com');
        // return (new InvoicePaidMailable($this->invoice))
        //             ->to($notifiable->email);
                    
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
