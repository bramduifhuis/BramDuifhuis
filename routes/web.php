<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessagesController;

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

Route::get('/', [MessagesController::class, 'stats'])->name('index');

Route::get('/dashboard', [MessagesController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

Route::resource('posts', MessagesController::class);

require __DIR__.'/auth.php';
