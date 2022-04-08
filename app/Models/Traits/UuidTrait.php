<?php

namespace App\Models\Traits;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

trait UuidTrait
{
    public static function booted()
    {
        static::creating(function (Model $model) {
            $model->{$model->getKeyName()} = Str::uuid();
        });
    }
}
