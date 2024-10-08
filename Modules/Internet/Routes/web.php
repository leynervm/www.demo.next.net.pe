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

use Modules\Internet\Http\Controllers\InternetController;

Route::prefix('admin/internet')->group(function() {
    Route::get('/', [InternetController::class, 'index']);
});
