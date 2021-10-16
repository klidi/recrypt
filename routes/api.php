<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('clients')->name('clients')->group(function () {
    Route::get('data', 'App\Clients\Controllers\GetDataController');
    Route::post('data', 'App\Clients\Controllers\StoreDataController');
});

