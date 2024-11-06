<?php

namespace Tests\Unit\Services;

use App\Filters\ListThingsFilter;
use App\Models\Thing;
use App\Repositories\Database\ThingRepository;
use App\Services\ThingService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;
use Tests\TestCase;

class ThingServiceTest extends TestCase
{
    public function test_it_can_find(): void
    {
        $thing = Thing::factory()
            ->make([
                'id' => Str::uuid()->toString()
            ]);

        $thingRepo = $this->createMock(
            ThingRepository::class
        );

        $thingRepo->expects($this->atLeastOnce())
            ->method('find')
            ->with($thing->id)
            ->willReturn($thing);

        $service = new ThingService(
            $thingRepo
        );

        $actual = $service->find($thing->id);

        $this->assertInstanceOf(
            Thing::class,
            $actual
        );

        $this->assertEquals(
            $thing->id,
            $actual->id
        );
    }

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

    public function test_it_can_get_paginated_list(): void
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
