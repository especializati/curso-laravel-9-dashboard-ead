<?php

namespace App\Repositories\Eloquent;

use App\Models\Support as Model;
use App\Repositories\Eloquent\Presenters\PaginationPresenter;
use App\Repositories\PaginationInterface;
use App\Repositories\SupportRepositoryInterface;

class SupportRepository implements SupportRepositoryInterface
{
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getByStatus(string $status, int $page): PaginationInterface
    {
        $perPage = 15;
        $offset = ($page - 1) * $perPage;

        $supports = $this->model
                        ->where('status', $status)
                        ->with(['user', 'lesson'])
                        // ->offset($offset)
                        // ->limit($perPage)
                        ->paginate();

        // return $supports->toArray();
        return new PaginationPresenter($supports);
    }

    public function findById(string $id): object|null
    {
        return $this->model
                    ->with([
                        'user',
                        'lesson',
                        'replies.user',
                        'replies.admin',
                    ])
                    ->find($id);
    }
}
