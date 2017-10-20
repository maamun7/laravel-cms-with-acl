<?php

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

Route::get('/', function () {
    $video = \App\DB\Admin\VideoUpload::all();
    return view('welcome')->withVideos($video);
});

// Authentication routes...
Route::get('admin/login', 'Admin\AdminAuthController@getLogin');
Route::post('admin/login', 'Admin\AdminAuthController@postLogin');
Route::get('admin/logout', 'Admin\AdminAuthController@getLogout');


// Registration routes...
//Route::get('auth/register', 'Auth\AuthController@getRegister');
//Route::post('auth/register', 'Auth\AuthController@postRegister');


//Route::get('admin/logout', 'Auth\AdminAuthController@getLogout');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin','middleware' => "auth" ], function()
{
    require_once(__DIR__ . "/Routes/Admin.php");
});
