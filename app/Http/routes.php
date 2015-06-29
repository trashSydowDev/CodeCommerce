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

        get('/create',['as'=>'categories_create','uses'=>'AdminCategoriesController@create']);


        Route::group(['prefix' => '{id}'], function(){

            get('/', ['as'=>'categories_show','uses'=>'AdminCategoriesController@show']);

            get('/delete',['as'=>'categories_delete','uses'=>'AdminCategoriesController@delete']);

            get('/edit',['as'=>'categories_edit','uses'=>'AdminCategoriesController@edit']);

            put('/update',['as'=>'categories_update','uses'=>'AdminCategoriesController@update']);

        });

        // CATEGORIAS API
        get('/api/', ['as' => 'categories_api',  function(Category $category) {
            return $category->all();
        }]);

        get('/api/{category}', ['as' => 'categories_api_show',  function(Category $category, $id) {
            return $category->find($id);
        }]);

    });

    // PRODUTOS
    Route::group(['prefix' => 'products'], function(){

        get('/', ['as' => 'products', 'uses' => 'AdminProductsController@index']);

        post('/',['as'=>'products','uses'=>'AdminProductsController@store']);

        get('/create',['as'=>'products_create','uses'=>'AdminProductsController@create']);

        // products/{id}
        Route::group(['prefix' => '{id}'], function(){

            get('/', ['as'=>'products_show','uses'=>'AdminProductsController@show']);

            get('/delete',['as'=>'products_delete','uses'=>'AdminProductsController@delete']);

            get('/edit',['as'=>'products_edit','uses'=>'AdminProductsController@edit']);

            put('/update',['as'=>'products_update','uses'=>'AdminProductsController@update']);

            // products/{id}/image
            Route::group(['prefix' => 'image'], function(){

                get('/', ['as'=>'products_image','uses'=>'AdminProductsImagesController@index']);

                get('/show', ['as'=>'products_image_show','uses'=>'AdminProductsImagesController@show']);

                get('/create', ['as'=>'products_image_create','uses'=>'AdminProductsImagesController@create']);

                post('/store', ['as'=>'products_image_store','uses'=>'AdminProductsImagesController@store']);

                get('/delete', ['as'=>'products_image_delete','uses'=>'AdminProductsImagesController@delete']);

            });

        });



        // products/api
        Route::group(['prefix' => 'api'], function(){

            get('/', ['as' => 'products_api',   function(Product $products) {
                return $products->all();
            }]);


            get('/{products}', ['as' => 'products_api_show',  function(Product $products, $id) {
                return $products->find($id);
            }]);

        });

    });

});
