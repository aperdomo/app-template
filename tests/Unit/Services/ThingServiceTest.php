<?php

namespace Tests\Unit\Services;

use App\Repositories\Database\ThingRepository;
use App\Services\ThingService;
use Tests\TestCase;

class ThingServiceTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void
    {
        $thingRepo = $this->createMock(
            ThingRepository::class
        );

        $thingRepo->expects($this->atLeastOnce())
            ->method('list')
            ->willReturn([]);

        $repo = new ThingService(
            $thingRepo
        );

        $this->assertIsArray(
            $repo->list()
        );

        $this->assertCount(
            0,
            $repo->list()
        );
    }
}
