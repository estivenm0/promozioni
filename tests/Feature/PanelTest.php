<?php

use Inertia\Testing\AssertableInertia;

it('has panel page', function () {
    $this->get('/panel')->assertInertia(fn (AssertableInertia $page) => $page
    ->component('Home'));

    // $response->assertStatus(200);
});
