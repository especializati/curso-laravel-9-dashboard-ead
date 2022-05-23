<?php

namespace App\Observers;

use App\Models\ReplySupport;
use Illuminate\Support\Str;

class ReplySupportObserver
{
    /**
     * Handle the ReplySupport "creating" event.
     *
     * @param  \App\Models\ReplySupport  $admin
     * @return void
     */
    public function creating(ReplySupport $reply)
    {
        $reply->admin_id = auth()->user()->id;
        // $reply->user_id = '8d67c8c6-8c7e-47e4-8a33-956220fe253a'; // tmp
        $reply->id = Str::uuid();
    }
}
