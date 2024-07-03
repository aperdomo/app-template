<?php

namespace App\Repositories\Database;

use App\Repositories\ThingRepositoryInterface;

class ThingRepository implements ThingRepositoryInterface
{
    public function list(): array
    {
        return [];
    }
}
