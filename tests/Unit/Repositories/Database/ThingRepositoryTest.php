<?php

namespace Tests\Unit\Repositories\Database;

use App\Repositories\Database\ThingRepository;
use Tests\TestCase;

class ThingRepositoryTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void
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
