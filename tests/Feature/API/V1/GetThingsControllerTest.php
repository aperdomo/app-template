<?php

namespace Tests\Feature\API\V1;

use App\Models\Thing;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetThingsControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_get_things(): void
    {
        $thing = Thing::factory()->create([
            'name' => 'Test Thing',
            'description' => 'Test Description',
        ]);

        $this->get('/api/v1/things')
            ->assertStatus(200)
            ->assertJsonStructure(['data' => [
                '*' => ['id', 'name', 'description'],
            ]])
            ->assertJsonCount(1, 'data')
            ->assertJson(['data' => [
                [
                    'id' => $thing->id,
                    'name' => $thing->name,
                    'description' => $thing->description,
                ]
            ]]);
    }

    public function test_it_can_get_things_filtered_by_name(): void
    {
        $thing = Thing::factory()->create([
            'name' => 'Test Thing ' . uniqid(),
            'description' => 'Test Description ' . uniqid(),
        ]);

        Thing::factory()->create([
            'name' => 'Another Test Thing ' . uniqid(),
            'description' => 'Another Test Description ' . uniqid(),
        ]);

        $this->get('/api/v1/things?name=' . $thing->name)
            ->assertStatus(200)
            ->assertJsonCount(1, 'data')
            ->assertJson(['data' => [
                [
                    'id' => $thing->id,
                    'name' => $thing->name,
                    'description' => $thing->description,
                ]
            ]]);
    }

    public function test_it_can_get_things_filtered_by_description(): void
    {
        $thing = Thing::factory()->create([
            'name' => 'Test Thing ' . uniqid(),
            'description' => 'Test Description ' . uniqid(),
        ]);

        Thing::factory()->create([
            'name' => 'Another Test Thing ' . uniqid(),
            'description' => 'Another Test Description ' . uniqid(),
        ]);

        $this->get('/api/v1/things?description=' . $thing->description)
            ->assertStatus(200)
            ->assertJsonCount(1, 'data')
            ->assertJson(['data' => [
                [
                    'id' => $thing->id,
                    'name' => $thing->name,
                    'description' => $thing->description,
                ]
            ]]);
    }

    public function test_it_can_get_things_with_page_size(): void
    {
        Thing::factory(40)->create();

        $this->get('/api/v1/things?page_size=' . 15)
            ->assertStatus(200)
            ->assertJsonCount(15, 'data');
    }
}
