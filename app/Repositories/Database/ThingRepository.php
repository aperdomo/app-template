<?php

namespace App\Repositories\Database;

use App\Filters\ListThingsFilter;
use App\Models\Thing;
use App\Repositories\ThingRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ThingRepository implements ThingRepositoryInterface
{
    /**
     * @param string $thingId
     * @return Thing
     */
    public function find(string $thingId): Thing
    {
        return Thing::find($thingId);
    }

    /**
     * @return Collection
     */
    public function list(): Collection
    {
        return Thing::all();
    }

    /**
     * @param ListThingsFilter $filter
     * @return LengthAwarePaginator
     */
    public function paginatedList(
        ListThingsFilter $filter
    ): LengthAwarePaginator {
        $query = Thing::query();

        if ($filter->name) {
            $query->where(
                'name',
                'like',
                "%$filter->name%"
            );
        }

        if ($filter->description) {
            $query->where(
                'description',
                'like',
                "%$filter->description%"
            );
        }

        return $query->paginate($filter->pageSize);
    }
}
