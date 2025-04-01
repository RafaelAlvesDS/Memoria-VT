<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/',[UserController::class, 'index']);

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/threads/{id_user}', [UserController::class, 'userThreads'])->name('user.threads');

Route::get('/search', [UserController::class, 'search'])->name('search');
