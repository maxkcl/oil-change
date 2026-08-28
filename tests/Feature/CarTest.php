<?php

test('home page route is accessible', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('odometer cannot be less than previous oil change odometer', function () {
    $response = $this->post('/check', [
        'odometer' => 1,
        'previous_oil_change_odometer' => 2,
        'previous_oil_change_date' => '2026-01-01'
    ]);

    $response->assertSessionHasErrors('odometer');
});

test('odometer can be equal to previous oil change odometer', function () {
    $response = $this->post('/check', [
        'odometer' => 1,
        'previous_oil_change_odometer' => 1,
        'previous_oil_change_date' => '2026-01-01'
    ]);

    $response->assertSessionDoesntHaveErrors('odometer');
});

test('odometer can be greater than previous oil change odometer', function () {
    $response = $this->post('/check', [
        'odometer' => 2,
        'previous_oil_change_odometer' => 1,
        'previous_oil_change_date' => '2026-01-01'
    ]);

    $response->assertSessionDoesntHaveErrors('odometer');
});

test('previous oil change date cannot be in the future', function () {
    $response = $this->post('/check', [
        'odometer' => 2,
        'previous_oil_change_odometer' => 1,
        'previous_oil_change_date' => '3026-01-01'
    ]);

    $response->assertSessionHasErrors('previous_oil_change_date');
});