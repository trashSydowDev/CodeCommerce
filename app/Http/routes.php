<?php

use CodeCommerce\Category;
use CodeCommerce\Product;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
get('/', ['as' => 'index', function () {
    return view('welcome');
}]);

Route::group(['prefix' => 'admin'], function(){

    Route::pattern('id', '[0-9]+');

    // CATEGORIAS
    Route::group(['prefix' => 'categories'], function(){

        get('/', ['as' => 'categories', 'uses' => 'AdminCategoriesController@index']);

        post('/',['as'=>'categories','uses'=>'AdminCategoriesController@store']);

        get('/create',['as'=>'categories_create','uses'=>'AdminCategoriesController@createAction']);


        Route::group(['prefix' => '{id}'], function(){

            get('/', ['as'=>'categories_show','uses'=>'AdminCategoriesController@show']);


            get('/delete',['as'=>'categories_delete','uses'=>'AdminCategoriesController@deleteAction']);

            get('/edit',['as'=>'categories_edit','uses'=>'AdminCategoriesController@editAction']);

        });

        // CATEGORIAS API
        get('/api/{category}', ['as' => 'categories_api_show',  function(Category $category) {
            return $category;
        }]);
    });

    // PRODUTOS
    Route::group(['prefix' => 'products'], function(){

        get('/', ['as' => 'products', 'uses' => 'AdminProductsController@index']);

        Route::group(['prefix' => '{id}'], function(){

            get('/', ['as'=>'products_show','uses'=>'AdminProductsController@showAction']);

            get('/delete',['as'=>'products_delete','uses'=>'AdminProductsController@deleteAction']);

            get('/edit',['as'=>'products_edit','uses'=>'AdminProductsController@editAction']);

        });

        // PRODUTOS API
        get('/api/{products}', ['as' => 'products_api_show',  function(Product $products) {
            return $products;
        }]);

    });

});
