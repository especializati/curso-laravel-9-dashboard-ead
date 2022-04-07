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
}
