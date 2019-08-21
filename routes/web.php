<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Routing Add Category
Route::match(['get','post'],'/','CategoryController@addCategory');

Route::match(['get','post'],'/dashboard','CategoryController@view_dash');

// Routing Add Categories database part
Route::match(['get','post'],'/admin/verify_cat','CategoryController@validateCat');

// Routing View Categories
Route::get('/admin/view-categories', 'CategoryController@view_category');

// Routing Edit Categories database part
Route::match(['get','post'],'/admin/edit-category/{id}','CategoryController@editCategory');

// Routing Updating Categories database part
Route::match(['get','post'],'/admin/update-category/{id}','CategoryController@updateCategory');

// Routing Delete Categories database part
Route::match(['get','post'],'/admin/delete-category/{id}','CategoryController@deleteCategory');