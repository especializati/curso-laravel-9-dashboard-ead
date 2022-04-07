<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Models\Course;

class CourseObserver
{
    /**
     * Handle the Admin "creating" event.
     *
     * @param  \App\Models\Course  $course
     * @return void
     */
    public function creating(Course $course)
    {
        $course->id = Str::uuid();
    }
}
