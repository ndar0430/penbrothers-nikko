<?php

use Illuminate\Http\Request;

Route::get('/pizza/elements', 'PizzaController@elements');

Route::post('/pizza/store', 'PizzaController@store');

Route::get('/order/get', 'OrderDetailController@get');

Route::get('/order/getById', 'OrderDetailController@getById');

Route::post('/order/store', 'OrderDetailController@store');

