<?php

namespace Tests\Unit;

use App\Domain\Shops\Models\Shop;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;
use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;
use function Pest\Laravel\deleteJson;
use function Pest\Laravel\putJson;
use function Pest\Laravel\patchJson;

uses(TestCase::class, RefreshDatabase::class);

it('get list of shops with ok response', function () {
    Shop::factory()->count(2)->create();
    $response = getJson('/api/v1/shops');
    $response->assertStatus(200)
        ->assertJson(
            fn (AssertableJson $json) =>
            $json->has('data', 2)
        );
});

it('get list of shops with not found response', function () {
    $response = getJson('/api/v1/fakeshops');
    $response->assertStatus(404);
});

it('get shop by id with ok response', function () {
    $shop = Shop::factory()->create();
    $response = getJson('/api/v1/shops/' . $shop->id);
    $response->assertStatus(200)
        ->assertJson(fn (AssertableJson $json) =>
            $json->has(
                'data',
                fn ($json) => $json->where('id', $shop->id)
            ->where('city', $shop->city)
            ->where('street', $shop->street)
            ->where('house', $shop->house)
            ->where('floor', $shop->floor)
            ));
});

it('get shop by id with not found response', function () {
    $shop = Shop::factory()->create();
    $response = getJson('/api/v1/shops/' . $shop->id+1);
    $response->assertStatus(404);
});

it('post shop with created response', function () {
    $shop = Shop::factory()->raw();
    $response = postJson('/api/v1/shops', $shop);
    $response->assertStatus(201)
    ->assertJson(fn (AssertableJson $json) =>
        $json->has(
            'data',
            fn ($json) => $json->whereType('id', 'integer')
        ->where('city', $shop['city'])
        ->where('street', $shop['street'])
        ->where('house', $shop['house'])
        ->where('floor', $shop['floor'])
        ));
    $this->assertDatabaseHas('shops', $shop);
});

it('post shop with not found response', function () {
    $shop = Shop::factory()->raw();
    $response = postJson('/api/v1/fakeshops', $shop);
    $response->assertStatus(404);
});

it('post shop with bad unprocessable entity(seems like bad request) response', function () {
    $shop = Shop::factory()->raw();
    $shop['city'] = null;
    $response = postJson('/api/v1/shops', $shop);
    $response->assertStatus(422);
});

it('delete shop by id with ok response', function () {
    $shop = Shop::factory()->create();
    $response = deleteJson('/api/v1/shops/'. $shop->id);
    $response->assertStatus(200);
    $this->assertDatabaseMissing('shops', $shop->attributesToArray());
});

it('delete shop by id with not found response', function () {
    $shop = Shop::factory()->create();
    $response = deleteJson('/api/v1/fakeshops/'. $shop->id);
    $response->assertStatus(404);
});

it('put shop by id with ok response', function () {
    $shop = Shop::factory()->create();
    $putshop = Shop::factory()->raw();
    $response = putJson('/api/v1/shops/'. $shop->id, $putshop);
    $response->assertStatus(200)->assertJson(fn (AssertableJson $json) =>
        $json->has(
            'data',
            fn ($json) =>
            $json->where('id', $shop->id)
            ->where('city', $putshop['city'])
            ->where('street', $putshop['street'])
            ->where('house', $putshop['house'])
            ->where('floor', $putshop['floor'])
        ));
    $this->assertDatabaseHas('shops', $putshop);
});

it('put shop by id with not found response', function () {
    $shop = Shop::factory()->create();
    $putshop = Shop::factory()->raw();
    $response = putJson('/api/v1/fakeshops/'. $shop->id, $putshop);
    $response->assertStatus(404);
});

it('put shop by id with bad request response', function () {
    $shop = Shop::factory()->create();
    $putshop = Shop::factory()->raw();
    $putshop['city'] = null;
    $response = putJson('/api/v1/shops/'. $shop->id, $putshop);
    $response->assertStatus(422);
});

it('patch shop by id with ok response', function () {
    $shop = Shop::factory()->create();
    $patchshop = Shop::factory()->raw();
    $response = patchJson('/api/v1/shops/'. $shop->id, $patchshop);
    $response->assertStatus(200)->assertJson(fn (AssertableJson $json) =>
        $json->has(
            'data',
            fn ($json) =>  $json->where('id', $shop->id)
            ->where('city', $patchshop['city'])
            ->where('street', $patchshop['street'])
            ->where('house', $patchshop['house'])
            ->where('floor', $patchshop['floor'])
        ));
    $this->assertDatabaseHas('shops', $patchshop);
});

it('patch shop by id with not found response', function () {
    $shop = Shop::factory()->create();
    $patchshop = Shop::factory()->raw();
    $response = putJson('/api/v1/fakeshops/'. $shop->id, $patchshop);
    $response->assertStatus(404);
});

it('patch shop by id with bad request response', function () {
    $shop = Shop::factory()->create();
    $patchshop = Shop::factory()->raw();
    $patchshop['city'] = null;
    $response = patchJson('/api/v1/shops/'. $shop->id, $patchshop);
    $response->assertStatus(422);
});
