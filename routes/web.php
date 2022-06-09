<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

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

Route::controller(BookController::class)->group(function () {
    Route::get('/', 'home');
    Route::get('/book', 'index');
    Route::get('/book/create', 'create');
    Route::get('/book/edit/{slug}', 'update');
    Route::post('/book', 'store');
    Route::patch('/book/{slug}', 'updateProcess');
    Route::delete('/book/{slug}', 'delete');
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/category', 'index');
    Route::get('/category/create', 'create');
    Route::get('/category/edit/{id}', 'update');
    Route::post('/category', 'store');
    Route::patch('/category/{id}', 'updateProcess');
    Route::delete('/category/{id}', 'delete');
});
