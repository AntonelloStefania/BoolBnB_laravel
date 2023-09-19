<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewContact extends Mailable
{
    use Queueable, SerializesModels;

    // public $message;
    // /**
    //  * Create a new message instance.
    //  *
    //  * @return void
    //  */
    // public function __construct($_message)
    // {
    //     $this->message = $_message;
    // }

    // /**
    //  * Get the message envelope.
    //  *
    //  * @return \Illuminate\Mail\Mailables\Envelope
    //  */
    // public function envelope()
    // {
    //     return new Envelope(
    //         subject: 'Nuovo contatto da form Bnb',
    //         replyTo: $this->message->address
    //     );
    // }

    // /**
    //  * Get the message content definition.
    //  *
    //  * @return \Illuminate\Mail\Mailables\Content
    //  */
    // public function content()
    // {
    //     return new Content(
    //         view: 'mails.new_email_contact',
    //     );
    // }

    // /**
    //  * Get the attachments for the message.
    //  *
    //  * @return array
    //  */
    // public function attachments()
    // {
    //     return [];
    // }
    public $messageData;

    /**
     * Create a new message instance.
     *
     * @param  array  $messageData
     * @return void
     */
    public function __construct(array $messageData)
    {
        $this->messageData = $messageData;
    }


    public function envelope(){
        return new Envelope(
            subject: 'New Message',
             replyTo: $this->messageData['email']
        );
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    // public function build()
    // {
    //     return $this->subject('Nuovo contatto da form Bnb')
    //                 ->view('emails.mails.new_email_contact')
    //                 ->with(['messageData' => $this->messageData]);
    // }

    public function content(){
        return new Content(
            view: 'mails.new_email_contact',
        );
    }

    public function attachment(){
        return [];
    }
}
