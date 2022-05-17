<?php

namespace App\Repositories\Eloquent\Presenters;

use App\Repositories\PaginationInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PaginationPresenter implements PaginationInterface
{
    public function __construct(
        protected LengthAwarePaginator $paginator
    ) {}

    public function items(): array
    {
        return $this->paginator->items();
    }

    public function total(): int
    {
        return (int) $this->paginator->total() ?? 0;
    }

    public function currentPage(): int
    {
        return (int) $this->paginator->currentPage() ?? 1;
    }

    public function perPage(): int
    {
        return (int) $this->paginator->perPage() ?? 1;
    }

    public function firstPage(): int
    {
        return (int) $this->paginator->firstItem() ?? 1;
    }

    public function lastPage(): int
    {
        return (int) $this->paginator->lastPage() ?? 1;
    }

}
