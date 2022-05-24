<?php

namespace App\Mail;

use App\Models\ReplySupport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailSupportReplied extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        public ReplySupport $replySupport
    ) {}

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Dúvida Respondida')
                    ->markdown('mails.supports.support-replied');
    }
}
