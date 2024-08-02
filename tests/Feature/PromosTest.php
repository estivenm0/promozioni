<?php

test('map page is displayed', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
