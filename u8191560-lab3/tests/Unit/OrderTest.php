<?php

namespace Tests\Unit;

use App\Domain\Orders\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;
use function Pest\Laravel\{getJson, postJson, deleteJson, putJson, patchJson};

uses(TestCase::class,RefreshDatabase::class);

it('get list of orders with ok response', function() {
    Order::factory()->count(2)->create();
    $response = getJson('/api/v1/orders');
    $response->assertStatus(200)
        ->assertJson(fn (AssertableJson $json) => 
            $json->has('data',2)
        );
});

it('get list of orders with not found response', function() {
    $response = getJson('/api/v1/fakeorders');
    $response->assertStatus(404);
});

it('get order by id with ok response', function() {
    $order = Order::factory()->create();
    $response = getJson('/api/v1/orders/' . $order->id);
    $response->assertStatus(200)
        ->assertJson(fn (AssertableJson $json) => 
            $json->has('data', fn($json) => $json->where('id', $order->id)
            ->where('shop_id', $order->shop_id)
            ->where('buyer_id', $order->buyer_id)
            ->where('item_id', $order->item_id)
            ->where('quanity', $order->quanity)
            ->where('order_discount', $order->order_discount)
            ->where('packaging_date', $order->packaging_date)
            ->where('arrival_date', $order->arrival_date)
        ));
});

it('get order by id with not found response', function() {
    $order = Order::factory()->create();
    $response = getJson('/api/v1/orders/' . $order->id+1);
    $response->assertStatus(404);
});

it('post order with created response', function() {
    $order = Order::factory()->raw();
    $response = postJson('/api/v1/orders', $order);
    $response->assertStatus(201)
    ->assertJson(fn (AssertableJson $json) => 
        $json->has('data', fn($json) => $json->whereType('id', 'integer')
        ->where('shop_id', $order['shop_id'])
        ->where('buyer_id', $order['buyer_id'])
        ->where('item_id', $order['item_id'])
        ->where('quanity', $order['quanity'])
        ->where('order_discount', $order['order_discount'])
        ->where('packaging_date', $order['packaging_date'])
        ->where('arrival_date', $order['arrival_date'])
    ));
    $this->assertDatabaseHas('orders', $order);
});

it('post order with not found response', function() {
    $order = Order::factory()->raw();
    $response = postJson('/api/v1/fakeorders', $order);
    $response->assertStatus(404);
});

it('post order with bad unprocessable entity(seems like bad request) response', function() {
    $order = Order::factory()->raw();
    $order['quanity'] = null;
    $response = postJson('/api/v1/orders', $order);
    $response->assertStatus(422);
});

it('delete order by id with ok response', function() {
    $order = Order::factory()->create();
    $response = deleteJson('/api/v1/orders/'. $order->id);
    $response->assertStatus(200);
    $this->assertDatabaseMissing('orders', $order->attributesToArray());
});

it('delete order by id with not found response', function() {
    $order = Order::factory()->create();
    $response = deleteJson('/api/v1/fakeorders/'. $order->id);
    $response->assertStatus(404);
});

it('put order by id with ok response', function() {
    $order = Order::factory()->create();
    $putorder = Order::factory()->raw();
    $response = putJson('/api/v1/orders/'. $order->id, $putorder);
    $response->assertStatus(200)->assertJson(fn (AssertableJson $json) =>
        $json->has('data', fn($json) => $json->where('id', $order->id)
        ->where('shop_id', $putorder['shop_id'])
        ->where('buyer_id', $putorder['buyer_id'])
        ->where('item_id', $putorder['item_id'])
        ->where('quanity', $putorder['quanity'])
        ->where('order_discount', $putorder['order_discount'])
        ->where('packaging_date', $putorder['packaging_date'])
        ->where('arrival_date', $putorder['arrival_date'])
    ));
    $this->assertDatabaseHas('orders', $putorder);
});

it('put order by id with not found response', function() {
    $order = Order::factory()->create();
    $putorder = Order::factory()->raw();
    $response = putJson('/api/v1/fakeorders/'. $order->id, $putorder);
    $response->assertStatus(404);
});

it('put order by id with bad request response', function() {
    $order = Order::factory()->create();
    $putorder = Order::factory()->raw();
    $putorder['quanity'] = null;
    $response = putJson('/api/v1/orders/'. $order->id, $putorder);
    $response->assertStatus(422);
});

it('patch order by id with ok response', function() {
    $order = Order::factory()->create();
    $patchorder = Order::factory()->raw();
    $response = patchJson('/api/v1/orders/'. $order->id, $patchorder);
    $response->assertStatus(200)->assertJson(fn (AssertableJson $json) =>
        $json->has('data', fn($json) =>  $json->where('id', $order->id)
            ->where('shop_id', $patchorder['shop_id'])
            ->where('buyer_id', $patchorder['buyer_id'])
            ->where('item_id', $patchorder['item_id'])
            ->where('quanity', $patchorder['quanity'])
            ->where('order_discount', $patchorder['order_discount'])
            ->where('packaging_date', $patchorder['packaging_date'])
            ->where('arrival_date', $patchorder['arrival_date'])
    ));
    $this->assertDatabaseHas('orders', $patchorder);
});

it('patch order by id with not found response', function() {
    $order = Order::factory()->create();
    $patchorder = Order::factory()->raw();
    $response = putJson('/api/v1/fakeorders/'. $order->id, $patchorder);
    $response->assertStatus(404);
});

it('patch order by id with bad request response', function() {
    $order = Order::factory()->create();
    $patchorder = Order::factory()->raw();
    $patchorder['quanity'] = null;
    $response = patchJson('/api/v1/orders/'. $order->id, $patchorder);
    $response->assertStatus(422);
});
