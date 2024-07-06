<?php

namespace Tests\Unit\Repositories\Database;

use App\Repositories\Database\ThingRepository;
use Database\Seeders\ThingSeeder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Pagination\LengthAwarePaginator;
use Tests\TestCase;

class ThingRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_list(): void
    {
        $repo = new ThingRepository();

        $this->seed(ThingSeeder::class);

        $this->assertInstanceOf(
            Collection::class,
            $repo->list()
        );

        $this->assertCount(
            10,
            $repo->list()
        );
    }

    public function test_it_can_paginated_list(): void
    {
        $repo = new ThingRepository();

        $this->assertInstanceOf(
            LengthAwarePaginator::class,
            $repo->paginatedList()
        );
    }
}
