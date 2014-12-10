<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(array('before'=>'auth'),
    function()
        {
            Route::resource('supplier','SuppliersController');
            Route::resource('user','UserController');
            Route::resource('Inventories', 'InventoriesController');
            Route::get('dashboard',array('uses'=>'MainController@dash', 'as'=>'dash'));
            Route::get('logout',array('uses'=>'MainController@logout', 'as'=>'logout'));
            Route::post('user/one',array('uses'=>'UserController@one', 'as'=>'one-user'));
            Route::resource('Receipts', 'ReceiptsController');
            Route::get('Receipts',array('uses'=>'InventoriesController@receipts','as'=>'receipts'));
            Route::Post('Inventories/Receipts',array('uses'=>'InventoriesController@receipt_store','as'=>'receipts.store'));
        }
);

Route::group(array('before' =>'csrf'),
    function()
    {
        Route::post('login', array('uses'=>'MainController@login', 'as'=>'login'));

    }
);

Route::get('/',array('uses'=>'MainController@index', 'as'=>'home'));
Route::get('/',array('uses'=>'MainController@index', 'as'=>'login'));
Route::get('/home',array('uses'=>'MainController@index', 'as'=>'login'));
Route::get('/login',array('uses'=>'MainController@index', 'as'=>'login'));
