<?php

use App\Http\Route;

Route::get('/', 'ClienteController@index');
Route::post('/form', 'ClienteController@store');
Route::get('/clientes', 'ClienteController@list');
