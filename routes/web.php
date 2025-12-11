<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\SearchController;
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

Route::get('/threads', [ThreadController::class, 'index'])->name('threads.index');

Route::get('/search', [UserController::class, 'search'])->name('search');
Route::get('/global-search', [SearchController::class, 'index'])->name('global.search');
