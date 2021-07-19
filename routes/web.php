<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Articles;
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

Route::get('/', function () {
    return view('productView');
});

Route::get('productView', [Articles::class, "fetch_articles"]);

