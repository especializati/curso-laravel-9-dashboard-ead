<?php

namespace App\Repositories\Eloquent;

use App\Models\Course as Model;
use App\Repositories\SupportRepositoryInterface;

class SupportRepository implements SupportRepositoryInterface
{
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getByStatus(string $status): array
    {
        $admins = $this->model
                        ->where(function ($query) use ($status) {
                            if ($status) {
                                $query->orWhere('name', 'LIKE', "%{$status}%");
                            }
                        })
                        //->with('')
                        ->get();

        return $admins->toArray();
    }

    public function findById(string $id): object|null
    {
        return $this->model->find($id);
    }
}
