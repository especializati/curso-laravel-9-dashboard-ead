<?php

namespace App\Repositories\Eloquent;

use App\Models\Module as Model;
use App\Repositories\ModuleRepositoryInterface;

class ModuleRepository implements ModuleRepositoryInterface
{
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAllByCourseId(string $courseId, string $filter = ''): array
    {
        $data = $this->model
                        ->where(function ($query) use ($filter) {
                            if ($filter) {
                                $query->orWhere('name', 'LIKE', "%{$filter}%");
                            }
                        })
                        ->where('course_id', $courseId)
                        ->get();

        return $data->toArray();
    }

    public function findById(string $id): object|null
    {
        return $this->model->find($id);
    }

    public function createByCourse(string $courseId, array $data): object
    {
        $data['course_id'] = $courseId;
        return $this->model->create($data);
    }

    public function update(string $id, array $data): object|null
    {
        if (!$itemDb = $this->findById($id)) {
            return null;
        }

        $itemDb->update($data);

        return $itemDb;
    }

    public function delete(string $id): bool
    {
        if (!$data = $this->findById($id))
            return false;

        return $data->delete();
    }

}
