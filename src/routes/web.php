<?php

$router->prefix(config('administer.url_prefix', 'administer'))->group(function ($router) {
    $router->get('/login', function () {
        $user = new Administer\Models\User;

        dd($user);
    });
});