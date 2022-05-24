<?php

namespace App\Listeners;

use App\Events\SupportReplied;
use App\Mail\SendMailSupportReplied as MailSendMailSupportReplied;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailSupportReplied
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\SupportReplied  $event
     * @return void
     */
    public function handle(SupportReplied $event)
    {
        $replySupport = $event->getReplySupport();
        $support = $replySupport->support;
        $user = $support->user;

        Mail::to($user->email)
                ->send(new MailSendMailSupportReplied($replySupport));
    }
}
