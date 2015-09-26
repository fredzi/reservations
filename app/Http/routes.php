<?php

Route::get('hall/block_seats', 'HallController@blockSeats');
Route::resource('hall', 'HallController');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);