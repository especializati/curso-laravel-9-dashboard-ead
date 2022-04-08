<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Models\Lesson;

class LessonObserver
{
    /**
     * Handle the User "creating" event.
     *
     * @param  \App\Models\Lesson  $user
     * @return void
     */
    public function creating(Lesson $lesson)
    {
        $lesson->id = Str::uuid();
        $lesson->url = Str::slug($lesson->name);
    }

    /**
     * Handle the User "updating" event.
     *
     * @param  \App\Models\Lesson  $user
     * @return void
     */
    public function updating(Lesson $lesson)
    {
        $lesson->url = Str::slug($lesson->name);
    }
}
