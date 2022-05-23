<?php

namespace App\Repositories\Presenters;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Repositories\PaginationInterface;

class PaginationPresenter implements PaginationInterface
{
    public function __construct(
        private LengthAwarePaginator $paginator
    ) {}

    public function items(): array
    {
        return $this->paginator->items();
    }

    public function total(): int
    {
        return $this->paginator->total() ?? 0;
    }

    public function currentPage(): int
    {
        return $this->paginator->currentPage() ?? 1;
    }

    public function lastPage(): int
    {
        return $this->paginator->lastPage() ?? 0;
    }

    public function firstPage(): int
    {
        return $this->paginator->firstItem() ?? 0;
    }
}
