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
    get('categories', ['as' => 'categories', 'uses' => 'AdminCategoriesController@index']);

    get('categories/{id}', ['as'=>'categories_show','uses'=>'AdminCategoriesController@show']);

    get('categories/{id}/delete',['as'=>'categories_delete','uses'=>'AdminCategoriesController@deleteAction']);

    get('categories/{id}/edit',['as'=>'categories_edit','uses'=>'AdminCategoriesController@editAction']);

    // CATEGORIAS API
    get('categories/api/{category}', ['as' => 'categories_api_show',  function(Category $category) {
        return $category;
    }]);



    // PRODUTOS
    get('products', ['as' => 'products', 'uses' => 'AdminProductsController@index']);

    get('products/{id}', ['as'=>'products_show','uses'=>'AdminProductsController@showAction']);

    get('products/{id}/delete',['as'=>'products_delete','uses'=>'AdminProductsController@deleteAction']);

    get('products/{id}/edit',['as'=>'products_edit','uses'=>'AdminProductsController@editAction']);

    // PRODUTOS API
    get('products/api/{products}', ['as' => 'products_api_show',  function(Product $products) {
        return $products;
    }]);

});
