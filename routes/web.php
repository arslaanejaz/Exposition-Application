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

$router->pattern('id', '[0-9]+');
$router->pattern('locationId', '[0-9]+');
$router->pattern('storage', 'public|company_logo|company_doc');
$router->pattern('download', '0|1');

Route::get('storage/{filename}/{storage?}/{download?}', 'FileController@index');

Route::group(
    [
        'prefix' => 'api'
    ],
    function()
    {
        Route::get('locations', 'Api\LocationController@index');
    }
);


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/exposition-hall-map/{id}', 'HomeController@expositionHallMap')->name('exposition-hall-map');
Route::get('/location/{locationId}/stand-reservation/{id}', 'StandController@standReservation')->name('stand-reservation');
Route::post('/reserve', 'StandController@reserve')->name('reserve');
