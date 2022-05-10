<?php

namespace Tests\Unit;

use App\Domain\Buyers\Models\Buyer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;
use function Pest\Laravel\{get, getJson, postJson, deleteJson, putJson, patchJson};

uses(TestCase::class,RefreshDatabase::class);

it('get list of buyers with ok response', function() {
    Buyer::factory()->count(2)->create();
    $response = $this->getJson('/api/v1/buyers');
    $response->assertStatus(200)
        ->assertJson(fn (AssertableJson $json) => 
            $json->has('data',2)
        );
});

it('get list of buyers with not found response', function() {
    $response = $this->getJson('/api/v1/fakebuyers');
    $response->assertStatus(404);
});

it('get buyer by id with ok response', function() {
    $buyer = Buyer::factory()->create();
    $response = $this->getJson('/api/v1/buyers/' . $buyer->id);
    $response->assertStatus(200)
        ->assertJson(fn (AssertableJson $json) => 
            $json->has('data', fn($json) => $json->where('id', $buyer->id)
            ->where('name', $buyer->name)
            ->where('lastname', $buyer->lastname)
            ->where('phone', $buyer->phone)
            ->where('street', $buyer->street)
            ->where('city', $buyer->city)
        ));
});

it('get buyer by id with not found response', function() {
    $buyer = Buyer::factory()->create();
    $response = $this->getJson('/api/v1/buyers/' . $buyer->id+1);
    $response->assertStatus(404);
});

it('post buyer with created response', function() {
    $buyer = Buyer::factory()->raw();
    $response = $this->postJson('/api/v1/buyers', $buyer);
    $response->assertStatus(201)
    ->assertJson(fn (AssertableJson $json) => 
        $json->has('data', fn($json) => $json->whereType('id', 'integer')
        ->where('name', $buyer['name'])
        ->where('lastname', $buyer['lastname'])
        ->where('phone', $buyer['phone'])
        ->where('street', $buyer['street'])
        ->where('city', $buyer['city'])
    ));
    $this->assertDatabaseHas('buyers', $buyer);
});

it('post buyer with not found response', function() {
    $buyer = Buyer::factory()->raw();
    $response = $this->postJson('/api/v1/fakebuyers', $buyer);
    $response->assertStatus(404);
});

it('post buyer with bad unprocessable entity(seems like bad request) response', function() {
    $buyer = Buyer::factory()->raw();
    $buyer['name'] = null;
    $response = $this->postJson('/api/v1/buyers', $buyer);
    $response->assertStatus(422);
});
