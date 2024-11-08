<?php

namespace App\Services;

use App\Models\Thing;
use App\Repositories\Database\ThingRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Filters\ListThingsFilter;

readonly class ThingService
{
    /**
     * @param ThingRepository $thingRepository
     */
    public function __construct(
        private ThingRepository $thingRepository
    ) {
    }

    /**
     * @param string $thingId
     * @return Thing
     */
    public function find(string $thingId): Thing
    {
        return $this->thingRepository
            ->find($thingId);
    }

    /**
     * @return Collection
     */
    public function list(): Collection
    {
        return $this->thingRepository
            ->list();
    }

    /**
     * @param ListThingsFilter $filter
     * @return LengthAwarePaginator
     */
    public function paginatedList(ListThingsFilter $filter): LengthAwarePaginator
    {
        return $this->thingRepository
            ->paginatedList($filter);
    }
}
