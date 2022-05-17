<?php

namespace App\Services;

use App\Repositories\SupportRepositoryInterface;

class SupportService
{
    private $repository;

    public function __construct(SupportRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getSupports(string $status = 'P', int $page = 1)
    {
        $data = $this->repository->getByStatus($status, $page);

        return convertItemsOfArrayToObject($data);
    }

    public function getSupport(string $id)
    {
        return $this->repository->findById($id);
    }
}
