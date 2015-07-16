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

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => '/'], function(){

    Route::pattern('id', '[0-9]+');

    get('/', ['as' => 'index', 'uses' => 'StoreController@index']);

    get('/home', ['as' => 'index_home', 'uses' => 'StoreController@index']);

    get('category/{id}', ['as' => 'store_category', 'uses' => 'StoreController@category']);

    get('product/{id}', ['as' => 'store_product', 'uses' => 'StoreController@product']);

    get('tag/{id}', ['as' => 'store_tag', 'uses' => 'StoreController@tags']);

    Route::group(['middleware' => 'auth'], function(){

        // ACCOUNT
        Route::group(['prefix' => 'account'], function(){

            get('', ['as' => 'account', 'uses' => 'AccountController@index']);

            get('/orders', ['as' => 'account_orders', 'uses' => 'AccountController@orders']);

            get('/address', ['as' => 'account_address', 'uses' => 'AccountController@address']);

            get('/address/new', ['as' => 'account_address_new', 'uses' => 'AccountController@addressnew']);

            get('/address/{id}/edit',['as'=>'account_address_edit','uses'=>'AccountController@edit']);

            put('/address/{id}/update',['as'=>'account_address_update','uses'=>'AccountController@update']);

            post('/register/address', ['as' => 'account_address_register', 'uses' => 'AccountController@registerAddress']);

        });

        get('checkout/placeOrder', ['as' => 'checkout_place', 'uses' => 'CheckoutController@place']);


    });

    Route::group(['prefix' => 'cart'], function(){

        get('/', ['as' => 'cart', 'uses' => 'CartController@index']);

        get('add/{id}', ['as' => 'cart_add', 'uses' => 'CartController@add']);

        get('delete/{id}', ['as' => 'cart_delete', 'uses' => 'CartController@destroy']);

        post('update/{id}', ['as' => 'cart_update', 'uses' => 'CartController@update']);

    });

});

Route::group(['prefix' => 'admin', 'middleware' => 'auth_admin'], function(){

    Route::pattern('id', '[0-9]+');

    get('/', ['as' => 'admin', 'uses' => 'AdminController@index']);

    get('/orders', ['as' => 'orders', 'uses' => 'OrderController@index']);

    get('/orders/{id}', ['as' => 'order_edit', 'uses' => 'OrderController@edit']);

    put('/orders/{id}/update', ['as' => 'order_update', 'uses' => 'OrderController@update']);

    // CATEGORIAS
    Route::group(['prefix' => 'categories'], function(){

        get('/', ['as' => 'categories', 'uses' => 'AdminCategoriesController@index']);

        post('/',['as'=>'categories','uses'=>'AdminCategoriesController@store']);

        get('/create',['as'=>'categories_create','uses'=>'AdminCategoriesController@create']);


        Route::group(['prefix' => '{id}'], function(){

            get('/', ['as'=>'categories_show','uses'=>'AdminCategoriesController@show']);

            get('/delete',['as'=>'categories_delete','uses'=>'AdminCategoriesController@destroy']);

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

        get('/images', ['as'=>'products_image_index','uses'=>'AdminProductsImagesController@index']);

        get('/images/{id}', ['as'=>'products_image_show','uses'=>'AdminProductsImagesController@show']);

        // products/{id}
        Route::group(['prefix' => '{id}'], function(){

            get('/', ['as'=>'products_show','uses'=>'AdminProductsController@show']);

            get('/delete',['as'=>'products_delete','uses'=>'AdminProductsController@destroy']);

            get('/edit',['as'=>'products_edit','uses'=>'AdminProductsController@edit']);

            put('/update',['as'=>'products_update','uses'=>'AdminProductsController@update']);

            // products/{id}/image
            Route::group(['prefix' => 'image'], function(){

                get('/', ['as'=>'products_image','uses'=>'AdminProductsController@showImages']);

                get('/create', ['as'=>'products_image_create','uses'=>'AdminProductsImagesController@create']);

                post('/store', ['as'=>'products_image_store','uses'=>'AdminProductsImagesController@store']);

                get('/delete', ['as'=>'products_image_delete','uses'=>'AdminProductsImagesController@destroy']);

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
