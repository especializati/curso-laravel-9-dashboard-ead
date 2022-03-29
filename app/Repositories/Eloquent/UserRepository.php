<?php

namespace App\Repositories\Eloquent;

use App\Models\User as Model;

class UserRepository
{
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
}
