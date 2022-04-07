<?php

namespace App\Services;

use App\Repositories\CourseRepositoryInterface;

class CourseService
{
    private $repository;

    public function __construct(CourseRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAll(string $filter = ''): array
    {
        $courses = $this->repository->getAll($filter);

        return convertItemsOfArrayToObject($courses);
    }

    public function create(array $data)
    {
        $this->repository->create($data);
    }

    public function findById(string $id)
    {
        return $this->repository->findById($id);
    }

    public function update(string $id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    public function delete(string $id)
    {
        return $this->repository->delete($id);
    }
}
