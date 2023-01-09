<?php

use function Pest\Laravel\getJson;

it('should not be successful', function () {
    getJson(route('telescope'))
        ->assertUnauthorized();
});
