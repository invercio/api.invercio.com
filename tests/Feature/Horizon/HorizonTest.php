<?php

use function Pest\Laravel\getJson;

it('should not be successful', function () {
    getJson(route('horizon.index'))
        ->assertUnauthorized();
});
