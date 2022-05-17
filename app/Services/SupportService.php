<?php

namespace App\Services;

use App\Repositories\PaginationInterface;
use App\Repositories\SupportRepositoryInterface;

class SupportService
{
    private $repository;

    public function __construct(SupportRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getSupports(string $status = 'P', int $page = 1): PaginationInterface
    {
        return $this->repository->getByStatus($status, $page);
    }

    public function getSupport(string $id)
    {
        return $this->repository->findById($id);
    }
}
