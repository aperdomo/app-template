<?php

namespace App\Repositories;

use App\Filters\ListThingsFilter;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface ThingRepositoryInterface
{
    /**
     * @return Collection
     */
    public function list(): Collection;

    /**
     * @param ListThingsFilter $filter
     * @return LengthAwarePaginator
     */
    public function paginatedList(ListThingsFilter $filter): LengthAwarePaginator;
}
