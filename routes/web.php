<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

// TODO: refactor controller name
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/users/{userId}/edit', [HomeController::class, 'edit'])->name('edit');
Route::patch('/users/{userId}', [HomeController::class, 'update'])->name('users.update');
