<?php

namespace App\Repositories;

interface SupportRepositoryInterface
{
    public function getByStatus(string $status): array;
    public function findById(string $id): object|null;
}
