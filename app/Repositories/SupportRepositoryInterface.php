<?php

namespace App\Repositories;

interface SupportRepositoryInterface
{
    public function getByStatus(string $status, int $page): PaginationInterface;
    public function findById(string $id): object|null;
}
