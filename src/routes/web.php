<?php

use Facades\Administer\Administer;

$prefix = config('administer.url_prefix', 'administer');

$router->prefix($prefix)->group(function ($router) {
    $router->middleware(['administer:guest'])->group(function ($router) {
        $router->get('/login', 'Auth\LoginController@form')->name('administer.login');
        $router->post('/login', 'Auth\LoginController@post');
    });

    $router->middleware(['administer:auth'])->group(function ($router) {
        $router->get('/', 'DashboardController@index')->name('administer.dashboard');
        $router->get('/models', 'Models\ModelsController@index')->name('administer.models');
        $router->get('/model/{model}', 'Model\ModelController@index')->name('administer.model');
        $router->get('/model/{model}/{record}', 'Model\RecordController@form')->name('administer.model.edit');
        $router->post('/model/{model}/{record}', 'Model\RecordController@post');
    });
});
