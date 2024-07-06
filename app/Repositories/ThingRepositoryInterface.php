<?php

namespace App\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface ThingRepositoryInterface
{
    /**
     * @return Collection
     */
    public function list(): Collection;

    /**
     * @param int $pageSize
     * @return LengthAwarePaginator
     */
    public function paginatedList(int $pageSize): LengthAwarePaginator;
}
