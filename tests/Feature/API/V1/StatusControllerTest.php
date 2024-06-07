<?php

namespace Tests\Feature\API\V1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StatusControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_gets(): void
    {
        $this->get('/api/v1/status')
            ->assertStatus(200)
            ->assertJson(['status' => 'ok']);
    }
}
