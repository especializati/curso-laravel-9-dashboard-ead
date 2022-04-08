<?php

namespace App\Repositories\Eloquent;

use App\Models\Lesson as Model;
use App\Repositories\LessonRepositoryInterface;

class LessonRepository implements LessonRepositoryInterface
{
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAllByModuleId(string $moduleId, string $filter = ''): array
    {
        $data = $this->model
                        ->where(function ($query) use ($filter) {
                            if ($filter) {
                                $query->orWhere('name', 'LIKE', "%{$filter}%");
                            }
                        })
                        ->where('module_id', $moduleId)
                        ->get();

        return $data->toArray();
    }

    public function findById(string $id): object|null
    {
        return $this->model->find($id);
    }

    public function createByModule(string $moduleId, array $data): object
    {
        $data['module_id'] = $moduleId;
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
