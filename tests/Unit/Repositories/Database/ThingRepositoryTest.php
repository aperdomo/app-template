<?php

namespace Tests\Unit\Repositories\Database;

use App\Repositories\Database\ThingRepository;
use Tests\TestCase;

class ThingRepositoryTest extends TestCase
{
    public function test_it_can_list(): void
    {
        $repo = new ThingRepository();

        $this->assertIsArray(
            $repo->list()
        );

        $this->assertCount(
            0,
            $repo->list()
        );
    }
}
