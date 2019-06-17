<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteproductProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

	Route::get('/', function () {
	    return view('user/store');
	});

//Category
	Route::group(['prefix'=>'admin'],function(){

		Route::get('categories','CategoryController@index');

		Route::post('categories','CategoryController@store');

		Route::get('categories/{categories}/edit','CategoryController@edit');

		Route::patch('categories/{categories}/edit','CategoryController@update');

		Route::delete('categories/{categories}','CategoryController@destroy');
	});


//News
	Route::group(['prefix'=>'admin'],function(){

		Route::get('news','NewsController@index');

		Route::post('news','NewsController@store');

		Route::get('news/{news}/edit','NewsController@edit');

		Route::patch('news/{news}/edit','NewsController@update');

		Route::delete('news/{news}','NewsController@destroy');
	});


//product Type
	Route::group(['prefix'=>'admin'],function(){

		Route::get('product_type','Product_typeController@index');

		Route::post('product_type','Product_typeController@store');

		Route::patch('product_type/{product_type}/edit/','Product_typeController@update');

		Route::delete('product_type/{product_type}','Product_typeController@destroy');
	});


//Product
	Route::group(['prefix'=>'admin'],function(){

		Route::get('product','ProductController@index');

		Route::post('product','ProductController@store');

		Route::get('product/{product}/edit','ProductController@edit');

		Route::patch('product/{product}/edit','ProductController@update');

		Route::delete('product/{product}','ProductController@destroy');
	});


//user
	//store
	Route::get('user/store','PageController@store');

	//blog
	Route::get('user/blog/{id}','PageController@blog');

	//pagination ajax
	/*Route::get('user/blog/page/{id}','PageController@get_home');*/

	Route::post('user/blog','PageController@ajax_blog');
