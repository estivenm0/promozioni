<?php

use App\Models\Category;
use App\Models\Promotion;

test('map page is displayed', function () {
    $response = $this->get('/promociones');

    $response->assertStatus(200);
});

test('can get promotions', function () {
    Promotion::factory(2)->create();

    $response = $this->get('/promos');

    $response->assertStatus(200);

    $response->assertJsonCount(2, 'promotions');
});

test('can get categories', function () {
    Category::factory(5)->create();

    $response = $this->get('/categories');

    $response->assertStatus(200);

    $response->assertJsonCount(5);

    $response->assertJsonStructure([
        [ 'id', 'name' ]
    ]);
});

test('show promotion is displayed', function () {
    $promotion = Promotion::factory()->create();

    $response = $this->get('/promociones/'. $promotion->slug);

    $response->assertSee($promotion->title);
});



