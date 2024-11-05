<?php

namespace Tests\Unit\Services;

use App\Filters\ListThingsFilter;
use App\Repositories\Database\ThingRepository;
use App\Services\ThingService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Tests\TestCase;

class ThingServiceTest extends TestCase
{
    public function test_it_can_list(): void
    {
        $thingRepo = $this->createMock(
            ThingRepository::class
        );

        $thingRepo->expects($this->atLeastOnce())
            ->method('list')
            ->willReturn(new Collection());

        $service = new ThingService(
            $thingRepo
        );

        $this->assertInstanceOf(
            Collection::class,
            $service->list()
        );

        $this->assertCount(
            0,
            $service->list()
        );
    }

    public function test_it_can_paginated_list(): void
    {
        $thingRepo = $this->createMock(
            ThingRepository::class
        );

        $thingRepo->expects($this->atLeastOnce())
            ->method('paginatedList')
            ->willReturn(new LengthAwarePaginator(
                new Collection(),
                0,
                10
            ));

        $service = new ThingService(
            $thingRepo
        );

        $this->assertInstanceOf(
            LengthAwarePaginator::class,
            $service->paginatedList(
                new ListThingsFilter()
            )
        );
    }
}
