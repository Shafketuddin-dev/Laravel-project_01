<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\{Content};

class NewConnectionNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $formData;

    /**
     * Create a new message instance.
     *
     * @param array $formData
     */
    public function __construct(array $formData)
    {
        $this->formData = $formData;
    }



    public function attachments(): array
    {
        return [];
    }

    public function build()
    {
        return $this->subject('OSCL: New Connection Request - ')
                    ->view('emails.new_connection_notification');
    }
}
