<?php

namespace App\Services;

use App\Repositories\Database\ThingRepository;

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
     * @return array
     */
    public function list(): array
    {
        return $this->thingRepository
            ->list();
    }
}
