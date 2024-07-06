<?php

namespace App\Repositories\Database;

use App\Models\Thing;
use App\Repositories\ThingRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ThingRepository implements ThingRepositoryInterface
{
    private const PER_PAGE = 10;

    /**
     * @return Collection
     */
    public function list(): Collection
    {
        return Thing::all();
    }

    /**
     * @param int $pageSize
     * @return LengthAwarePaginator
     */
    public function paginatedList(
        int $pageSize = self::PER_PAGE
    ): LengthAwarePaginator {
        return Thing::paginate($pageSize);
    }
}
