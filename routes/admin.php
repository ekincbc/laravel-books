<?php

use Illuminate\Support\Facades\Route;

Route::get('admin/authors', 'Admin\AuthorController@index');

// display the create form
Route::get('admin/authors/create', 'Admin\AuthorController@create');

// handle the create form's submission
Route::post('admin/authors', 'Admin\AuthorController@save')->name('author.store');

// display the edit form
Route::get('/admin/authors/{author_id}/edit', 'Admin\AuthorController@edit');

// handle the edit form's submission
Route::put('/admin/authors/{author_id}', 'Admin\AuthorController@save')->name('author.update');

// display the detail of an author
Route::get('admin/authors/{author_id}', 'Admin\AuthorController@show');

// the path of Admin is in the RouteServiceProvide which is in Providers