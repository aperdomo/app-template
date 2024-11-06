<?php

namespace Tests\Unit\Repositories\Database;

use App\Filters\ListThingsFilter;
use App\Models\Thing;
use App\Repositories\Database\ThingRepository;
use Database\Seeders\ThingSeeder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Pagination\LengthAwarePaginator;
use Tests\TestCase;

class ThingRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_find(): void
    {
        $repo = new ThingRepository();

        $thing = Thing::factory()->create();
        $actual = $repo->find($thing->id);

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

    public function test_it_can_get_paginated_list(): void
    {
        $repo = new ThingRepository();

        $this->assertInstanceOf(
            LengthAwarePaginator::class,
            $repo->paginatedList(
                new ListThingsFilter()
            )
        );
    }

    public function test_it_can_filter_paginated_list_by_name(): void
    {
        $repo = new ThingRepository();
        $expected = Thing::factory()->create([
            'name' => 'Test Thing ' . uniqid(),
            'description' => 'Test Description',
        ]);

        $actual = $repo->paginatedList(
            new ListThingsFilter(
                $expected->name,
            )
        );

        $this->assertInstanceOf(
            LengthAwarePaginator::class,
            $actual
        );

        $this->assertCount(
            1,
            $actual
        );

        $this->assertEquals(
            $expected->name,
            $actual->first()->name
        );

        $this->assertEquals(
            $expected->description,
            $actual->first()->description
        );
    }

    public function test_it_can_filter_paginated_list_by_description(): void
    {
        $repo = new ThingRepository();
        $expected = Thing::factory()->create([
            'name' => 'Test Thing ' . uniqid(),
            'description' => 'Test Description ' . uniqid(),
        ]);

        $actual = $repo->paginatedList(
            new ListThingsFilter(
                null,
                $expected->description,
            )
        );

        $this->assertInstanceOf(
            LengthAwarePaginator::class,
            $actual
        );

        $this->assertCount(
            1,
            $actual
        );

        $this->assertEquals(
            $expected->name,
            $actual->first()->name
        );

        $this->assertEquals(
            $expected->description,
            $actual->first()->description
        );
    }
}
