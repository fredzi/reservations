<?php

//główny widok

Route::get('/', 'HomeController@index');

//widok - sale
Route::get('hall','HallController@index');
Route::get('hall/create','HallController@create');
Route::post('hall/first_step', 'HallController@storeFirstStep');
Route::post('hall/second_step','HallController@storeSecondStep');
Route::get('hall/{id}/edit','HallController@edit');
Route::post('hall/{id}/edit','HallController@update');
Route::delete('hall/delete/{id}','HallController@destroy');
Route::get('hall/block_seats', 'HallController@blockSeats');
Route::get('hall/{id}','HallController@show');


//logowanie i rejestracja
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

//widok dla logowania i rejestracji
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');

//widok dla movies
Route::get('movies','MovieController@index');
Route::get('movies/create','MovieController@create');
Route::post('movies','MovieController@store');
Route::get('movies/{id}/edit','MovieController@edit');
Route::post('movies/{id}/edit','MovieController@update');
Route::delete('movies/delete/{id}','MovieController@destroy');

//widok dla reportoire
Route::get('repertoire','RepertoireController@index');
Route::get('repertoire/create','RepertoireController@create');
Route::post('repertoire','RepertoireController@store');
Route::get('repertoire/{id}/edit','RepertoireController@edit');
Route::post('repertoire/{id}/edit','RepertoireController@update');
Route::delete('repertoire/delete/{id}','RepertoireController@destroy');

//widok dla spectators
Route::get('spectators','SpectatorTypeController@index');
Route::get('spectators/create','SpectatorTypeController@create');
Route::post('spectators','SpectatorTypeController@store');
Route::get('spectators/{id}/edit','SpectatorTypeController@edit');
Route::post('spectators/{id}/edit','SpectatorTypeController@update');
Route::delete('spectators/delete/{id}','SpectatorTypeController@destroy');

//widok dla reservations
Route::get('reservations','ReservationsController@index');
Route::get('reservations/create','ReservationsController@create');
Route::get('reservations/{id}', 'ReservationsController@show');
Route::post('reservations','ReservationsController@store');
Route::get('reservations/{id}/edit','ReservationsController@edit');
Route::post('reservations/{id}/edit','ReservationsController@update');
Route::delete('reservations/delete/{id}','ReservationsController@destroy');

//widok dla ustawień
Route::get('settings','SettingsController@index');
Route::get('settings/create','SettingsController@create');
Route::post('settings','SettingsController@store');
Route::get('settings/{id}/edit','SettingsController@edit');
Route::post('settings/{id}/edit','SettingsController@update');


