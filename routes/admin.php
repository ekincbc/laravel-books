<?php

use Illuminate\Support\Facades\Route;

Route::get('books/create', 'BookController@create');
Route::get('books', 'BookController@index');
Route::get('books', 'BookController@store');


// the path of Admin is in the RouteServiceProvide which is in Providers