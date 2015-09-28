<?php

//główny widok
Route::get('/','MainController@index');


//hall - sale
Route::get('hall/block_seats', 'HallController@blockSeats');
Route::resource('hall', 'HallController');
Route::get('hall','HallController@index');
Route::get('hall/create','HallController@create');
Route::post('hall','HallController@store');

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

//wybrane widoki tylko dla zalogowanych 
Route::get('profile', ['middleware' => 'auth', function() {
}]);

//widok dla movies
Route::get('movies','MovieController@index');
Route::get('movies/create','MovieController@create');
Route::post('movies','MovieController@store');
Route::get('movies/{id}/edit','MovieController@edit');
Route::patch('movies/{id}/edit','MovieController@update');
Route::delete('movies/delete/{id}','MovieController@destroy');


