<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

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
    return view('welcome');
});

// Route::get('/blog', [BlogController::class, 'index']);
// Route::get('/blog/create', [BlogController::class, 'create']);
// Route::post('/blog/store', [BlogController::class, 'store']);
// Route::get('/blog/show/{id}',[BlogController::class, 'show']);
// Route::get('/blog/edit/{id}',[BlogController::class, 'edit']);
// Route::put('/blog/update/{id}', [BlogController::class, 'update']);
// Route::delete('/blog/destroy/{id}', [BlogController::class, 'destroy']);

Route::resource('blog', BlogController::class);
