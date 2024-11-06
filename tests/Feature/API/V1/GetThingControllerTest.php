<?php

namespace Tests\Feature\API\V1;

use App\Models\Thing;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetThingControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_get_thing(): void
    {
        $thing = Thing::factory()->create([
            'name' => 'Test Thing',
            'description' => 'Test Description',
        ]);

        $this->get("/api/v1/things/$thing->id")
            ->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'name',
                'description'
            ])
            ->assertJson([
                    'id' => $thing->id,
                    'name' => $thing->name,
                    'description' => $thing->description,
            ]);
    }
}
