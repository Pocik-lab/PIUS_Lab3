<?php

namespace Tests\Unit;

use App\Domain\Items\Models\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;
use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;
use function Pest\Laravel\deleteJson;
use function Pest\Laravel\putJson;
use function Pest\Laravel\patchJson;

uses(TestCase::class, RefreshDatabase::class);

it('get list of items with ok response', function () {
    Item::factory()->count(2)->create();
    $response = getJson('/api/v1/items');
    $response->assertStatus(200)
        ->assertJson(
            fn (AssertableJson $json) =>
            $json->has('data', 2)
        );
});

it('get list of items with not found response', function () {
    $response = getJson('/api/v1/fakeitems');
    $response->assertStatus(404);
});

it('get item by id with ok response', function () {
    $item = Item::factory()->create();
    $response = getJson('/api/v1/items/' . $item->id);
    $response->assertStatus(200)
        ->assertJson(fn (AssertableJson $json) =>
            $json->has(
                'data',
                fn ($json) => $json->where('id', $item->id)
            ->where('type', $item->type)
            ->where('name', $item->name)
            ->where('description', $item->description)
            ->where('cost', $item->cost)
            ));
});

it('get item by id with not found response', function () {
    $item = Item::factory()->create();
    $response = getJson('/api/v1/items/' . $item->id+1);
    $response->assertStatus(404);
});

it('post item with created response', function () {
    $item = Item::factory()->raw();
    $response = postJson('/api/v1/items', $item);
    $response->assertStatus(201)
    ->assertJson(fn (AssertableJson $json) =>
        $json->has(
            'data',
            fn ($json) => $json->whereType('id', 'integer')
        ->where('type', $item['type'])
        ->where('name', $item['name'])
        ->where('description', $item['description'])
        ->where('cost', $item['cost'])
        ));
    $this->assertDatabaseHas('items', $item);
});

it('post item with not found response', function () {
    $item = Item::factory()->raw();
    $response = postJson('/api/v1/fakeitems', $item);
    $response->assertStatus(404);
});

it('post item with bad unprocessable entity(seems like bad request) response', function () {
    $item = Item::factory()->raw();
    $item['cost'] = 0;
    $response = postJson('/api/v1/items', $item);
    $response->assertStatus(422);
});

it('delete item by id with ok response', function () {
    $item = Item::factory()->create();
    $response = deleteJson('/api/v1/items/'. $item->id);
    $response->assertStatus(200);
    $this->assertDatabaseMissing('items', $item->attributesToArray());
});

it('delete item by id with not found response', function () {
    $item = Item::factory()->create();
    $response = deleteJson('/api/v1/fakeitems/'. $item->id);
    $response->assertStatus(404);
});

it('put item by id with ok response', function () {
    $item = Item::factory()->create();
    $putitem = Item::factory()->raw();
    $response = putJson('/api/v1/items/'. $item->id, $putitem);
    $response->assertStatus(200)->assertJson(fn (AssertableJson $json) =>
        $json->has(
            'data',
            fn ($json) =>
            $json->where('id', $item->id)
            ->where('type', $putitem['type'])
            ->where('name', $putitem['name'])
            ->where('description', $putitem['description'])
            ->where('cost', $putitem['cost'])
        ));
    $this->assertDatabaseHas('items', $putitem);
});

it('put item by id with not found response', function () {
    $item = Item::factory()->create();
    $putitem = Item::factory()->raw();
    $response = putJson('/api/v1/fakeitems/'. $item->id, $putitem);
    $response->assertStatus(404);
});

it('put item by id with bad request response', function () {
    $item = Item::factory()->create();
    $putitem = Item::factory()->raw();
    $putitem['cost'] = 0;
    $response = putJson('/api/v1/items/'. $item->id, $putitem);
    $response->assertStatus(422);
});

it('patch item by id with ok response', function () {
    $item = Item::factory()->create();
    $patchitem = Item::factory()->raw();
    $response = patchJson('/api/v1/items/'. $item->id, $patchitem);
    $response->assertStatus(200)->assertJson(fn (AssertableJson $json) =>
        $json->has(
            'data',
            fn ($json) =>
            $json->where('id', $item->id)
            ->where('type', $patchitem['type'])
            ->where('name', $patchitem['name'])
            ->where('description', $patchitem['description'])
            ->where('cost', $patchitem['cost'])
        ));
    $this->assertDatabaseHas('items', $patchitem);
});

it('patch item by id with not found response', function () {
    $item = Item::factory()->create();
    $patchitem = Item::factory()->raw();
    $response = putJson('/api/v1/fakeitems/'. $item->id, $patchitem);
    $response->assertStatus(404);
});

it('patch item by id with bad request response', function () {
    $item = Item::factory()->create();
    $patchitem = Item::factory()->raw();
    $patchitem['cost'] = 0;
    $response = patchJson('/api/v1/items/'. $item->id, $patchitem);
    $response->assertStatus(422);
});
