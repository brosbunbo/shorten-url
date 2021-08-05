<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\ShortenUrlsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('shorten-url')
->namespace('\App\Http\Controllers\API')
->group(function () {
    Route::post('/', 'ShortenUrlsController@store');

    Route::middleware('auth.admin')->group(function () {
        Route::get('/', 'ShortenUrlsController@index');
        Route::delete('/{id}', 'ShortenUrlsController@destroy');
    });
});