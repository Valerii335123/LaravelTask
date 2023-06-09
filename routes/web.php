<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/** Protected routes */
Route::middleware('auth')
    ->group(function () {
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::resource('task', TaskController::class)
            ->only('index', 'show', 'create', 'store', 'edit', 'update','destroy');
    });




